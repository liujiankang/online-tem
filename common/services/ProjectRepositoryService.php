<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\helper\FileHelper;
use common\models\host\HostBasic;
use common\models\project\ProjectDetail;
use common\models\repository\RepositoryBasic;
use common\models\task\TaskDetail;
use common\services\ssh\SshAuthService;
use GitElephant\Repository;
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
    private $ssh2_sftp;
    public $isHaveMasterHost = false;

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
        $ssh2_sftp= $this->getSsh2_sftp();
        $realDistant = $this->projectMainHost->web_root .DIRECTORY_SEPARATOR. $distant;
        $realLocal = $local;
        //如果远程文件存在
        //如果本地目录存在
        Yii::trace(['$realDistant' => $realDistant, '$realLocal' => $realLocal]);
        $testFile = $this->execCmd("test -e $realDistant");
        Yii::trace(['$testFile' => $testFile,"test -e $realDistant" ]);

        $fileInfo = ssh2_sftp_stat($ssh2_sftp, $realDistant);
        if ($fileInfo) {
            $localPath = dirname($realLocal);
            if (!is_dir($localPath)) {
                FileHelper::createDirectory($localPath);
            }
            $result = ssh2_scp_recv($connection, $realDistant, $realLocal);
        } else {
            $result = 'not exit file';
        }

        return $result;
    }

    /**
     *  原始方式运行数据
     */
    public function execCmd($cmd)
    {
        $connection = $this->getConnection();
        $stream = ssh2_exec($connection, $cmd);
        $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
        stream_set_blocking($errorStream, true);
        stream_set_blocking($stream, true);

        $output=stream_get_contents($stream);
        $error= stream_get_contents($errorStream);
        return ['code'=>0,'output'=>$output,'error'=>$error];
    }

    /*向服务器上传文件*/
    public function uploadFile($local_file, $remote_file)
    {
        $mod = 0644;
        $connection = $this->getConnection();
        $realDistant = $this->projectMainHost->web_root . $remote_file;
        $realLocal = $local_file;
        return ssh2_scp_send($connection, $realLocal, $realDistant, $mod);
    }


    public function getConnection()
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

    public function getSsh2_sftp()
    {
        if (empty($this->ssh2_sftp)) {
            $this->ssh2_sftp = ssh2_sftp($this->getConnection());
        }
        return $this->ssh2_sftp;
    }
}