<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services\ssh;


use common\helper\FileHelper;
use common\models\host\HostBasic;
use common\models\repository\RepositoryBasic;
use common\models\task\TaskBasic;
use common\models\task\TaskDetail;
use common\services\BaseService;
use Yii;

class SshAuthService extends BaseService
{

    public $configDir = '/home/www-data/.ssh';
    public $configTemplet = 'Host $host_alias
    HostName $host_name
    User $user
    Port $port
    PubkeyAuthentication yes
    IdentityFile $id_rsa
    
    
';
    public $defaultConfig = '
    StrictHostKeyChecking=no
';
    public $temp_rsa_file = [];

    public function init()
    {
        $hostAll = HostBasic::findAll(['auth_type' => HostBasic::AUTH_TYPE_RSAKEY]);
        if (is_array($hostAll)) {
            $this->backupConfig();
            $config = '';
            foreach ($hostAll as $one) {
                $config .= $this->getConfig($one);
            }

            $fileHand = fopen($this->getConfigFileDir(), 'w+');
            $config .= $this->defaultConfig;
            fwrite($fileHand, $config);
            fclose($fileHand);
        }
        return true;
    }

    public function initByHostModel(HostBasic $host)
    {
        if ($host->auth_type == HostBasic::AUTH_TYPE_PASSWORD) {
            return false;
        }
        $rsa_file = $this->configDir . DIRECTORY_SEPARATOR . 'id_rsa';
        $rsa_pub_file = $this->configDir . DIRECTORY_SEPARATOR . 'id_rsa.pub';

        //private
        $fileHand = fopen($rsa_file, 'w+');
        fwrite($fileHand, $host->rsa_key_pri);
        fclose($fileHand);
        chmod($rsa_file, 0600);

        //public
        $fileHand = fopen($rsa_pub_file, 'w+');
        fwrite($fileHand, $host->rsa_key_pub);
        fclose($fileHand);
        chmod($rsa_pub_file, 0600);

        return true;
    }

    /*
     * @return String $config
     * */
    public function getConfig(HostBasic $host)
    {
        if ($host->auth_type == HostBasic::AUTH_TYPE_PASSWORD) {
            return '';
        }
        $host_alias = $host->host_alias;
        if (strpos($host->host_ip, ':')) {
            $hostPort = explode(':', $host->host_ip);
            $host_name = $hostPort[0];
            $port = $hostPort[1];
        } else {
            $host_name = $host->host_ip;
            $port = '22';
        }
        $user = $host->user_name;
        $id_rsa = 'id_rsa_' . $host->id;
        $fileName = $this->configDir . DIRECTORY_SEPARATOR . $id_rsa;
        array_push($this->temp_rsa_file, $fileName);

        $fileHand = fopen($fileName, 'w+');
        fwrite($fileHand, $host->rsa_key_pri);
        fclose($fileHand);
        chmod($fileName, 0600);

        $config = $this->configTemplet;
        $config = str_replace('$host_alias', $host_alias, $config);
        $config = str_replace('$host_name', $host_name, $config);
        $config = str_replace('$user', $user, $config);
        $config = str_replace('$port', $port, $config);
        $config = str_replace('$id_rsa', $id_rsa, $config);
        return $config;
    }

    public function backupConfig()
    {
        $ora_name = $this->getConfigFileDir();
        $back_name = $ora_name . '.back';
        shell_exec("mv $back_name /dev/null");
        shell_exec("mv $ora_name $back_name");
        return true;
    }

    public function restoreConfig()
    {
        $ora_name = $this->getConfigFileDir();
        $back_name = $ora_name . '.back';

        if (is_file($back_name)) {
            shell_exec("mv $ora_name /dev/null");
            shell_exec("mv $back_name $ora_name");

            foreach ($this->temp_rsa_file as $one) {
                shell_exec("mv $one /dev/null");
            }
        }
        return true;
    }

    public function getConfigFileDir()
    {
        return $this->configDir . DIRECTORY_SEPARATOR . 'config';
    }

    public function getPrivateDir()
    {
        return $this->configDir . '/id_rsa';
    }

    public function getPublicDir()
    {
        return $this->configDir . '/id_rsa.pub';
    }

    public function unInit()
    {
        @unlink($this->getPrivateDir());
        @unlink($this->getPublicDir());
    }

    public function getScp()
    {

    }
}