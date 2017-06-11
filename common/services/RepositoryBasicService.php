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
use SebastianBergmann\Diff\Differ;

class RepositoryBasicService extends BaseService
{

    public function getRepositoryInstance($repoId){
        $repoModel=RepositoryBasic::findOne($repoId);
        $repo = Repository::open('/webCode/walle');
        //$repo->getCaller()->execute('');
        //var_dump($repo->getBranches());
        var_dump($repo->getLog('master_new',null,2)->first()->getMessage()->toString());
        var_dump($repo->getLog('master_new',null,2)->first()->getSha());
        var_dump($repo->getLog('master',null,2)->first()->getMessage()->toString());
        var_dump($repo->getLog('master',null,2)->first()->getSha());
    }

}