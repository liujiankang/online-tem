<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-20
 * Time: 下午10:33
 */

namespace frontend\controllers;


use common\models\repository\RepositoryMonitor;
use common\services\RepositoryBasicService;
use Yii;
class MonitorController extends BaseController
{

    /*
       * 监视代码库提交日志
       * 1.取出所有要监控的代码库，并依次循环
       * 2.取出代码库，要监控的分支，最新的提交日志
       * 3.将最新的日志和已经提交过的日志，和最新警告过的日志比对，并作相应的
       *
      //得到最新的操作日志
      //对比确定是否分发
      */

    public function actionRun()
    {
        $now = time();
        $RepositoryMonitors = RepositoryMonitor::find()->select('id')->column();

        foreach ($RepositoryMonitors as $MonitorId) {
            $monitorRepository = RepositoryMonitor::findOne($MonitorId);
            $repositoryBasic = $monitorRepository->getRepository();
            $repositoryBasicService = (new RepositoryBasicService())->init($repositoryBasic);
            $repositoryBasicService->refresh($monitorRepository->branch_tag);
            $latestCommitHash = $repositoryBasicService->getLastCommitSha($monitorRepository->branch_tag);
            $latestCommitMsg = $repositoryBasicService->getLastCommitMsg($monitorRepository->branch_tag);
            if (empty($monitorRepository->last_commit)) {
                $monitorRepository->last_commit = $latestCommitHash;
                $monitorRepository->last_commit_message = $latestCommitMsg;
                $monitorRepository->save();
                $monitorRepository->refresh();
            }
            if ($monitorRepository->last_commit != $latestCommitHash) {
                if ($monitorRepository->warned_commit != $latestCommitHash
                    || ($monitorRepository->warned_commit == $latestCommitHash && abs($monitorRepository->warned_time - $now) > $monitorRepository->warned_interval)
                ) {
                    //如果已经警告过，且超过了警告周期
                    //send message
                    var_dump('send message', __CLASS__);
                    $monitorRepository->warned_commit = $latestCommitHash;
                    $monitorRepository->warned_time = $now;

                    if ($monitorRepository->warned_end_time < $now) {
                        $monitorRepository->last_commit = $latestCommitHash;
                    }
                    $monitorRepository->save();
                }
            }

            $monitorRepository->refresh();
            $monitorRepository->last_monitor_time = $now;
            $monitorRepository->save();
        }

    }


    /*
     * 监视代码库提交日志
     * 1.取出所有要监控的代码库，并依次循环
     * 2.取出代码库，要监控的分支，最新的提交日志
     * 3.将最新的日志和已经提交过的日志，和最新警告过的日志比对，并作相应的
     *
    //得到最新的操作日志
    //对比确定是否分发
    */

    public function actionDiff()
    {
        $now = \Yii::$app->date->getNowTime();
        $RepositoryMonitors = RepositoryMonitor::find()->select('id')->column();

        foreach ($RepositoryMonitors as $MonitorId) {
            $monitorRepository = RepositoryMonitor::findOne($MonitorId);
            $repositoryBasic = $monitorRepository->getRepository();
            $repositoryBasicService = (new RepositoryBasicService())->init($repositoryBasic);
            $repositoryBasicService->comp(1,2);
        }

    }
}