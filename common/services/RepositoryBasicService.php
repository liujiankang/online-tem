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

    public function getRepositoryInstance($repoId){
        $comd="ls -al /";$this->var_exec($comd);
        $comd="pwd";$this->var_exec($comd);
        $comd="who";$this->var_exec($comd);
        $comd="echo '1234567890' >> /home/www-data/123.txt";$this->var_exec($comd);

        $fhand=fopen('/home/www-data/123.txt','a+');
        fwrite($fhand,'123456');
        fclose($fhand);
        FileHelper::findFiles('dd');
        die;




        $repoModel=RepositoryBasic::findOne($repoId);
        if($repoModel->auth_type==RepositoryBasic::AUTH_TYPE_PASSWORD){

        }else{

        }
        $repo = Repository::open('/webCode/walle');
        $repo->init(); // init
        $repo->cloneFrom("git://github.com/matteosister/GitElephant.git");
        Repository::createFromRemote();
        //$repo->getCaller()->execute('');
        //var_dump($repo->getBranches());
        var_dump($repo->getLog('master_new',null,2)->first()->getMessage()->toString());
        var_dump($repo->getLog('master_new',null,2)->first()->getSha());
        var_dump($repo->getLog('master',null,2)->first()->getMessage()->toString());
        var_dump($repo->getLog('master',null,2)->first()->getSha());
    }

    public function var_exec($cmd){
        $reslut=exec($cmd);
        var_dump($reslut);
    }
}