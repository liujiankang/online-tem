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
            $MonitorRepository = RepositoryMonitor::findOne($MonitorId);
            var_dump($MonitorRepository->getRepository()->attributes);die;
            $RepositoryInstance = (new RepositoryBasicService())->getRepositoryInstance($MonitorRepository->getRepository());
            $latestCommitHash = $RepositoryInstance->getLastCommit($MonitorRepository->branch_tag)->getFullMessage();
            if ($MonitorRepository->last_commit != $latestCommitHash) {

                if ($MonitorRepository->warned_commit != $latestCommitHash
                    || ($MonitorRepository->warned_commit == $latestCommitHash && abs($MonitorRepository->warned_time - $now) > $MonitorRepository->warned_interval)
                ) {
                    //如果已经警告过，且超过了警告周期
                    //send message
                    $MonitorRepository->warned_commit = $latestCommitHash;
                    $MonitorRepository->warned_time = $now;

                    if ($MonitorRepository->warned_end_time < $now) {
                        $MonitorRepository->last_commit = $latestCommitHash;
                    }
                    $MonitorRepository->save();
                }
            }

            $MonitorRepository->refresh();
            $MonitorRepository->last_monitor_time = $now;
            $MonitorRepository->save();
        }

    }

}