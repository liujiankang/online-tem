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
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use Yii;

class RepositoryBasicService extends BaseService
{
    public $authFile;
    public $repositoryBasic;
    public $repositoryInstance;

    public function setAuth(RepositoryBasic $repositoryBasic)
    {
        $name = md5($repositoryBasic->id . $repositoryBasic->name);
        $path = "/home/www-data/.ssh/$name";
        $pathPub = "/home/www-data/.ssh/$name.pub";
        if ($repositoryBasic->auth_type == RepositoryBasic::AUTH_TYPE_RSAKEY) {

            //私钥
            $fHand = fopen($path, 'w');
            fwrite($fHand, $repositoryBasic->id_rsa);
            fclose($fHand);
            chmod($path, '600');

            //公钥

            $fHand = fopen($pathPub, 'w');
            fwrite($fHand, $repositoryBasic->id_rsa);
            fclose($fHand);
            chmod($pathPub, '600');

        }
    }

    public function unsetAuth()
    {

    }

    public function getRepositoryInstance(RepositoryBasic $repositoryBasic)
    {
        try {
            $this->setAuth($repositoryBasic);
            if (!empty($repositoryBasic->local_path)) {
                $repo_dir = \Yii::getAlias($repositoryBasic->local_path);
                $RepositoryInstance = Repository::open($repo_dir);
            } else {
                $repo_dir_name = md5($repositoryBasic->id . $repositoryBasic->name . $repositoryBasic->url);
                $repo_dir_alias = '@common' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $repo_dir_name;
                $repo_dir = \Yii::getAlias($repo_dir_alias);
                Yii::trace($repo_dir);
                if (is_dir($repo_dir)) {
                    FileHelper::removeDirectory($repo_dir);
                }
                FileHelper::createDirectory($repo_dir);
                $RepositoryInstance = Repository::createFromRemote($repositoryBasic->url, $repo_dir);
                if ($RepositoryInstance instanceof Repository) {
                    $repositoryBasic->local_path = $repo_dir_alias;
                    $repositoryBasic->save();
                    Yii::info(['save repo directory', $repositoryBasic->id, $repositoryBasic->local_path], __CLASS__);
                }
            }
        } catch (\Exception $e) {
            throw $e;
        }

        $commit=$RepositoryInstance->getCommit();
        var_dump($commit->getMessage());
        var_dump($commit->getSha());
        var_dump($commit->getCommitter());
        var_dump($commit->getContainedIn());
        var_dump($commit->getTree());
        var_dump($commit->getRepository());
        var_dump($commit->getDiff());
        var_dump($commit->getParents());
        $this->repositoryInstance = $RepositoryInstance;
        return $this;

//        $repo->cloneFrom("git://github.com/matteosister/GitElephant.git");
//        Repository::createFromRemote();
//        //$repo->getCaller()->execute('');
//        //var_dump($repo->getBranches());
//        var_dump($repo->getLog('master_new', null, 2)->first()->getMessage()->toString());
//        var_dump($repo->getLog('master_new', null, 2)->first()->getSha());
//        var_dump($repo->getLog('master', null, 2)->first()->getMessage()->toString());
//        var_dump($repo->getLog('master', null, 2)->first()->getSha());
//        return $this;
    }

    public function var_exec($cmd)
    {
        $reslut = exec($cmd, $output, $res);
        var_dump([$cmd, $reslut, $output, $res]);
    }


    public function getLastCommit($tagOrBranch = null)
    {
        if ($this->repositoryInstance && ($this->repositoryInstance instanceof Repository)) {
            $hash=$this->repositoryInstance->getCommit($tagOrBranch)->getSha();
            $message=$this->repositoryInstance->getCommit($tagOrBranch)->getMessage();

            var_dump([$hash,$message]);die;

        } else {
            throw new \Exception('没有实例化库');
        }
    }
}