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

    public $RepositoryBasic;
    public function init($repositoryId)
    {
        $this->RepositoryBasic = (new RepositoryBasicService())->getRepositoryInstance($repositoryId);
        return $this;
    }

    public function monitor($monitor,$repo){

    }

}