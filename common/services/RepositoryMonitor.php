<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\models\repository\RepositoryBasic;

class RepositoryMonitor
{

    public function init($repositoryId)
    {
        $RepositoryBasic = (new RepositoryBasicService())->getRepositoryInstance($repositoryId);
        var_dump($RepositoryBasic);
    }

}