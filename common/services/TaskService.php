<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\models\host\HostBasic;
use common\models\repository\RepositoryBasic;
use common\models\task\TaskBasic;
use common\models\task\TaskDetail;
use Yii;

class HostBasicService extends BaseService
{

    public $task;
    public $taskDetails;


    public function init(TaskBasic $task)
    {
        $this->taskDetails = TaskDetail::findAll(['task_id' => $task->id]);
    }

    public function patch()
    {
        foreach ($this->taskDetails as $oneTask) {
            $repositoryBasic = RepositoryBasic::findOne($oneTask->repo_id);
            $repositoryBasicService = (new RepositoryBasicService())->init($repositoryBasic);
            $diffFile = $repositoryBasicService->getDiffFilesOfCommitByCmd($oneTask->base_commit_hash, $oneTask->task_branch);

            var_dump($diffFile);
        }

    }

    public function backup($isForcePatch = false)
    {
    }


    public function getSourcePath(TaskDetail $task)
    {
        $path = Yii::getAlias("@run/patch/source_task{$task->id}_repo{$task->repo_id}");
        $path .= md5($task->base_branch . $task->base_commit_hash . $task->task_branch . $task->task_commit_hash);
    }

    public function getTargetPath(TaskDetail $task)
    {
    }
}