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
use yii\helpers\FileHelper;
use Yii;

/*
 *
 * */

class ProjectRepositoryService extends BaseService
{
    public $authFile;
    /* @var $repositoryBasic RepositoryBasic */
    public $repositoryBasic;
    /* @var $repositoryInstance Repository */
    public $repositoryInstance;

    public function setAuth(RepositoryBasic $repositoryBasic)
    {
        //$name = md5($repositoryBasic->id . $repositoryBasic->name);
        $path = "/home/www-data/.ssh/id_rsa";
        $pathPub = "/home/www-data/.ssh/id_rsa.pub";
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
        $path = "/home/www-data/.ssh/id_rsa";
        $pathPub = "/home/www-data/.ssh/id_rsa.pub";
        @unlink($path);
        @unlink($pathPub);
    }

    public function init(RepositoryBasic $repositoryBasic)
    {

        $this->repositoryBasic = $repositoryBasic;
        $this->setAuth($repositoryBasic);
        $repo_dir = $this->getOrCreateRepoDir();
        try {
            $repositoryInstance = Repository::open($repo_dir);
            $branch = $repositoryInstance->getBranches(true, true);
            if (!is_array($branch) || count($branch) < 1) {
                $repositoryInstance = $this->createRepo();
            }
        } catch (\Exception $e) {
            $repositoryInstance = $this->createRepo();
        }
        $this->repositoryInstance = $repositoryInstance;
        return $this;
    }
    /*从服务器上下载文件*/
    public function downFile($source, $dist)
    {
        return true;
    }

    /*向服务器上传文件*/
    public function uploadFile($source, $dist)
    {
        return true;
    }

}