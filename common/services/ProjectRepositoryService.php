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
    public function downFile($distant, $local)
    {
            $connection = $this->getConnection();
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
        $result=$connection->getExec()->run($cmd);
        var_dump($result);
        die;
    }

    public function originalDownFile($distant,$local){
        if ($this->projectMainHost instanceof ProjectDetail && $this->hostMain instanceof HostBasic) {
            $realDistant = $this->projectMainHost->web_root . $distant;
            $realLocal = $local;
            $username=$this->hostMain->user_name;
            $port='22';
            $host=$this->hostMain->host_ip;
            $id_rsa='/home/www-data/.ssh/id_rsa';
            $cmd ="/usr/bin/scp -o \"StrictHostKeyChecking no\" -P{$port} -i $id_rsa $username@$host:$realDistant $realLocal";
            var_dump($cmd);
            //exec($cmd,$result);var_dump($result);var_dump(shell_exec('uname')); die;
//            var_dump(shell_exec('ls -al'));
            var_dump(shell_exec($cmd));
//            var_dump(shell_exec('ls -al /home/www-data/.ssh'));
//            var_dump(shell_exec('/usr/bin/scp'));die;
            return shell_exec($cmd);
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
    public function getConnection()
    {
        if (!$this->connection) {
            if ($this->hostMain->auth_type == HostBasic::AUTH_TYPE_RSAKEY) {
                $sshAuthServer = (new SshAuthService());
                $sshAuthServer->initByHostModel($this->hostMain);
                //$configFile = $sshAuthServer->getConfigFileDir();
                //$configuration = new SshConfigFileConfiguration($configFile, $this->hostMain->host_ip);
                //$authentication = $configuration->getAuthentication();

                $configuration = new Configuration($this->hostMain->getHostIp(),$this->hostMain->getPort());
                $authentication = new PublicKeyFile($this->hostMain->user_name, $sshAuthServer->getPublicDir(), $sshAuthServer->getPublicDir());
            } else {
                $configuration = new Configuration($this->hostMain->host_alias);
                $authentication = new SshPassword($this->hostMain->user_name, $this->hostMain->user_pass);
            }
            $this->connection = new Session($configuration, $authentication);
        }
        return $this->connection;
    }

    public function getOriginalConnection()
    {
        if (!$this->connection) {
            if ($this->hostMain->auth_type == HostBasic::AUTH_TYPE_RSAKEY) {
                $sshAuthServer = (new SshAuthService());
                $sshAuthServer->initByHostModel($this->hostMain);
                $connection = ssh2_connect($this->hostMain->getHostIp(),$this->hostMain->getPort());
                ssh2_auth_pubkey_file($connection, $this->hostMain->user_name, $sshAuthServer->getPublicDir(), $sshAuthServer->getPublicDir());

            } else {
                $connection = ssh2_connect($this->hostMain->getHostIp(),$this->hostMain->getPort());
                ssh2_auth_password($connection, $this->hostMain->user_name, $this->hostMain->user_pass);
            }
            $this->connection = $connection;
        }
        return $this->connection;

        /*
         *
         *
        $stream = ssh2_exec($connection, 'ls /data/www');
        $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

        stream_set_blocking($errorStream, true);
        stream_set_blocking($stream, true);

        echo "Output: " . stream_get_contents($stream);
        echo "Error: " . stream_get_contents($errorStream);

        */
    }
}