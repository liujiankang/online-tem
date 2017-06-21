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
use yii\helpers\FileHelper;

class RepositoryBasicService extends BaseService
{
    public $authFile;
    public function setAuth(RepositoryBasic $repositoryBasic){

    }
    public function unsetAuth(){

    }
    public function getRepositoryInstance(RepositoryBasic $repositoryBasic)
    {
        if(!empty($repositoryBasic->local_path)){
            $RepositoryInstance=Repository::open($repositoryBasic->local_path);
        }else{

        }
        $repoModel = RepositoryBasic::findOne($repoId);
        if ($repoModel->auth_type == RepositoryBasic::AUTH_TYPE_PASSWORD) {

        } else {

        }
        $repo->init(); // init
        $repo->cloneFrom("git://github.com/matteosister/GitElephant.git");
        Repository::createFromRemote();
        //$repo->getCaller()->execute('');
        //var_dump($repo->getBranches());
        var_dump($repo->getLog('master_new', null, 2)->first()->getMessage()->toString());
        var_dump($repo->getLog('master_new', null, 2)->first()->getSha());
        var_dump($repo->getLog('master', null, 2)->first()->getMessage()->toString());
        var_dump($repo->getLog('master', null, 2)->first()->getSha());
        return $this;
    }

    public function var_exec($cmd)
    {
        $reslut = exec($cmd);
        var_dump($reslut);
    }


    public function getLastCommit($tagOrBranch = null)
    {
        return new \GitElephant\Objects\Commit\Message(1);
    }
}