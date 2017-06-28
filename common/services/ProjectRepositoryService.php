<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\models\host\HostBasic;
use common\models\project\ProjectDetail;
use common\models\repository\RepositoryBasic;
use common\models\task\TaskDetail;
use GitElephant\Repository;
use Ssh\SshConfigFileConfiguration;
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
    /* @var $taskDetail TaskDetail */
    public $taskDetail;

    /* @var $projectMainHost ProjectDetail */
    public $projectMainHost;

    /* @var $hostMain HostBasic */
    public $hostMain;

    public $isHaveMasterHost = false;

    public function setAuth()
    {
        //$name = md5($repositoryBasic->id . $repositoryBasic->name);
        $path = "/home/www-data/.ssh/id_rsa";
        $pathPub = "/home/www-data/.ssh/id_rsa.pub";
        if ($this->hostMain->auth_type == HostBasic::AUTH_TYPE_RSAKEY) {

            //私钥
            $fHand = fopen($path, 'w');
            fwrite($fHand, $this->hostMain->id_rsa);
            fclose($fHand);
            chmod($path, '600');

            //公钥

            $fHand = fopen($pathPub, 'w');
            fwrite($fHand, $this->hostMain->id_rsa_pub);
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

    public function init(TaskDetail $oneTask)
    {
        $this->taskDetail = $oneTask;
        $hostMaster = ProjectDetail::findOne(['is_master' => true, 'project_id' => $oneTask->project_id]);
        if ($hostMaster) {
            $this->isHaveMasterHost = true;
        } else {
            $this->projectMasterHost = false;
            $hostMaster = ProjectDetail::findOne(['project_id' => $oneTask->project_id]);
        }

        if ($hostMaster instanceof ProjectDetail) {
            $this->projectMainHost = $hostMaster;
            $this->hostMain = HostBasic::findOne($hostMaster->host_id);
        }

        return $this;
    }

    /*从服务器上下载文件*/
    public function downFile($source, $dist)
    {
        if ($this->projectMainHost instanceof ProjectDetail && $this->hostMain instanceof HostBasic) {
            $this->setAuth();
        } else {
            throw new \Exception('没有可供链接的服务器');
        }
        return true;
    }

    /*向服务器上传文件*/
    public function uploadFile($source, $dist)
    {
        return true;
    }

}