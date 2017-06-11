<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\models\repository\RepositoryBasic;
use GitElephant\Repository;

class RepositoryBasicService extends BaseService
{

    public function getRepositoryInstance($repoId){
        $repoModel=RepositoryBasic::findOne($repoId);
        $repo = Repository::open('/webCode/walle');
        var_dump($repo->getBranches());
        var_dump($repo->getTags());
        var_dump($repo->getCommit());
        var_dump($repo->getLog());

    }

}