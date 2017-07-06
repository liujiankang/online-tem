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
use Ssh\Authentication\Password as SshPassword;
use Ssh\Authentication\PublicKeyFile;
use Ssh\Configuration;
use Ssh\Session;
use Ssh\SshConfigFileConfiguration;
use yii\helpers\FileHelper;
use Yii;

/*
 *
 * */

class ProjectRepositoryService1 extends BaseService
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

    /*@var $Session Session*/
    private $connection;
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

    /**
     *
     * $distant 如果是相对路径则从，映射的路径开始;如果是绝对路径则是，web根目录
     * $local 如果是相对路径则从，映射的web路径开始;如果是绝对路径则是绝对路径
     * 从服务器上下载文件
     * @var
     */
    public function downFileByOriginal($distant, $local)
    {
        $connection = $this->getOriginalConnection();
        $realDistant = $this->projectMainHost->web_root . $distant;
        $realLocal = $local;
        return $result = ssh2_scp_recv($connection, $realDistant, $realLocal);
    }
    public function downFile($distant, $local)
    {
        $connection = $this->getOriginalConnection();
        $scp = $connection->getSftp();
        $realDistant = $this->projectMainHost->web_root . $distant;
        $realLocal = $local;
        var_dump($scp, $realDistant, $realLocal);die;
        return $scp->receive($realDistant, $realLocal);
    }
    /**
     *
     * $distant 如果是相对路径则从，映射的路径开始;如果是绝对路径则是，web根目录
     * $local 如果是相对路径则从，映射的web路径开始;如果是绝对路径则是绝对路径
     * 从服务器上下载文件
     * @var
     */
    public function execCmd($cmd)
    {
        $connection = $this->getConnection();
        $exec=$connection->getExec();
        $resource=$exec->getResource();//->run($cmd);
        var_dump($resource);
        var_dump($exec->getSessionResource());
        var_dump($exec->run($cmd));die;
        var_dump($result);
        die;
    }

    /**
     *  原始方式运行数据
     */
    public function execOriginalCmd($cmd)
    {
        $connection = $this->getOriginalConnection();
        $stream = ssh2_exec($connection, $cmd);
        $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
        stream_set_blocking($errorStream, true);
        stream_set_blocking($stream, true);

        $output=stream_get_contents($stream);
        $error= stream_get_contents($errorStream);
        return ['code'=>0,'output'=>$output,'error'=>$error];
    }
    public function originalDownFile($distant,$local){
        if ($this->projectMainHost instanceof ProjectDetail && $this->hostMain instanceof HostBasic) {
            $realDistant = $this->projectMainHost->web_root . $distant;
            $realLocal = $local;
            $username=$this->hostMain->user_name;
            $port='22';
            $host=$this->hostMain->host_ip;
            $connection=$this->getConnection();
            $sftp=$connection->getSftp();
            return $sftp->receive($distant,$local);
        } else {
            throw new \Exception('没有可供链接的服务器');
        }
    }

    /*向服务器上传文件*/
    public function uploadFile($source, $dist)
    {
        return true;
    }

    /**
     * @return Session $connection
     */
//    public function getConnection()
//    {
//        if (!$this->connection) {
//            if ($this->hostMain->auth_type == HostBasic::AUTH_TYPE_RSAKEY) {
//                $sshAuthServer = (new SshAuthService());
//                $sshAuthServer->initByHostModel($this->hostMain);
//                //$configFile = $sshAuthServer->getConfigFileDir();
//                //$configuration = new SshConfigFileConfiguration($configFile, $this->hostMain->getHostIp(),$this->hostMain->getPort());
//                //$authentication = $configuration->getAuthentication(null,$this->hostMain->user_name);
//
//                $configuration = new Configuration($this->hostMain->getHostIp(),$this->hostMain->getPort());
//                $authentication = new PublicKeyFile($this->hostMain->user_name, $sshAuthServer->getPublicDir(), $sshAuthServer->getPrivateDir());
//            } else {
//                $configuration = new Configuration($this->hostMain->host_alias);
//                $authentication = new SshPassword($this->hostMain->user_name, $this->hostMain->user_pass);
//            }
//            $this->connection = new Session($configuration, $authentication);
//            $this->connection;
//        }
//        return $this->connection;
//    }

    public function getOriginalConnection()
    {
        if (!$this->connection) {
            if ($this->hostMain->auth_type == HostBasic::AUTH_TYPE_RSAKEY) {
                $sshAuthServer = (new SshAuthService());
                $sshAuthServer->initByHostModel($this->hostMain);
                Yii::trace(['host' => $this->hostMain->getHostIp(), 'port' => $this->hostMain->getPort(), 'username' => $this->hostMain->user_name, 'idrsa' => $sshAuthServer->getPrivateDir(), 'idrsapub' => $sshAuthServer->getPublicDir()], __CLASS__);
                $connection = ssh2_connect($this->hostMain->getHostIp(), $this->hostMain->getPort());
                ssh2_auth_pubkey_file($connection, $this->hostMain->user_name, $sshAuthServer->getPublicDir(), $sshAuthServer->getPrivateDir());
            } else {
                Yii::trace(['host' => $this->hostMain->getHostIp(), 'port' => $this->hostMain->getPort(), 'username' => $this->hostMain->user_name, 'password' => $this->hostMain->user_pass], __CLASS__);
                $connection = ssh2_connect($this->hostMain->getHostIp(), $this->hostMain->getPort());
                ssh2_auth_password($connection, $this->hostMain->user_name, $this->hostMain->user_pass);
            }
            $this->connection = $connection;
        }
        return $this->connection;
    }
}