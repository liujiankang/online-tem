<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\helper\FileHelper;
use common\models\host\HostBasic;
use common\models\repository\RepositoryBasic;
use common\models\task\TaskBasic;
use common\models\task\TaskDetail;
use Yii;

class TaskService extends BaseService
{

    public $task;
    public $taskDetails;


    public function init(TaskBasic $task)
    {
        $this->taskDetails = TaskDetail::findAll(['task_id' => $task->id]);
        return $this;
    }

    public function patch()
    {
        $patchResult = [];
        foreach ($this->taskDetails as $oneTask) {
            $repositoryBasic = RepositoryBasic::findOne($oneTask->repo_id);
            $repositoryBasicService = (new RepositoryBasicService())->init($repositoryBasic);
            $diffFile = $repositoryBasicService->getDiffFilesOfCommitByCmd($oneTask->base_commit_hash, $oneTask->task_branch);
            Yii::trace(['diff file name is', $diffFile], __CLASS__);
            $patchPath = $this->getPatchDir($oneTask);
            foreach ($diffFile as $oneFile) {
                $sourceFile = $repositoryBasic->local_path . DIRECTORY_SEPARATOR . $oneFile;
                $distFile = $patchPath . DIRECTORY_SEPARATOR . $oneFile;
                if (is_file($sourceFile)) {
                    $distFileDir = dirname($distFile);
                    if (!is_dir($distFileDir)) {
                        FileHelper::createDirectory($distFileDir);
                    }
                    $result = copy($sourceFile, $distFile);
                } else {
                    $result = 'no file';
                }
                $copyData = ['$sourceFile' => $sourceFile, '$distFile' => $distFile, '$result' => $result];
                array_push($patchResult, $copyData);
            }
        }
        Yii::info(['patch result', $patchResult], __CLASS__);
        return true;

    }

    public function backup()
    {
        $patchResult = [];
        foreach ($this->taskDetails as $oneTask) {
            $projectRepositoryService=(new ProjectRepositoryService())->init($oneTask);
            $repositoryBasic = RepositoryBasic::findOne($oneTask->repo_id);
            $repositoryBasicService = (new RepositoryBasicService())->init($repositoryBasic);
            $diffFile = $repositoryBasicService->getDiffFilesOfCommitByCmd($oneTask->base_commit_hash, $oneTask->task_branch);
            Yii::trace(['diff file name is', $diffFile], __CLASS__);
            $backupPath = $this->getBackupDir($oneTask);
            foreach ($diffFile as $oneFile) {
                //$sourceFile = $repositoryBasic->local_path . DIRECTORY_SEPARATOR . $oneFile;
                $sourceFile = $oneFile;
                $distFile = $backupPath . DIRECTORY_SEPARATOR . $oneFile;
                $isDowned=$projectRepositoryService->downFile($sourceFile,$distFile);
                if ($isDowned && is_file($sourceFile)) {
                    $distFileDir = dirname($distFile);
                    if (!is_dir($distFileDir)) {
                        FileHelper::createDirectory($distFileDir);
                    }
                    $result = true;
                } else {
                    $result = false;
                }
                $copyData = ['$sourceFile' => $sourceFile, '$distFile' => $distFile, '$result' => $result];
                array_push($patchResult, $copyData);
            }
        }
        Yii::info(['patch result', $patchResult], __CLASS__);
        return true;

    }


    public function getSourcePath(TaskDetail $task)
    {

    }

    public function getTargetPath(TaskDetail $task)
    {
    }


    public function getPatchDir(TaskDetail $task)
    {
        if ($task->updated_at > 1) {
            $date = date('Y-m-d', $task->updated_at);
        } elseif ($task->created_at > 1) {
            $date = date('Y-m-d', $task->created_at);
        } else {
            $date = date('Y-m-d');
        }
        $path = Yii::getAlias("@run/patch/{$date}_repo{$task->repo_id}_task{$task->id}_source_");
        $path .= substr(md5($task->base_branch . $task->base_commit_hash . $task->task_branch . $task->task_commit_hash), 1, 5);
        return $path;
    }

    public function getBackupDir(TaskDetail $task)
    {
        if ($task->updated_at > 1) {
            $date = date('Y-m-d', $task->updated_at);
        } elseif ($task->created_at > 1) {
            $date = date('Y-m-d', $task->created_at);
        } else {
            $date = date('Y-m-d');
        }
        $path = Yii::getAlias("@run/patch/{$date}_repo{$task->repo_id}_task{$task->id}_backup_");
        $path .= substr(md5($task->base_branch . $task->base_commit_hash . $task->task_branch . $task->task_commit_hash), 1, 5);
        return $path;
    }
}