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
use common\models\repository\RepositoryBasic;
use common\models\task\TaskBasic;
use common\models\task\TaskDetail;
use Yii;

class SshAuthService extends BaseService
{

    public $configDir = '/home/www-data/.ssh';
    public $model = 'Host $host_alias
    HostName $host_name
    User $user
    Port $port
	PubkeyAuthentication yes
    IdentityFile $id_rsa';

    public function init()
    {
        $hostAll = HostBasic::findAll(['auth_type' => HostBasic::AUTH_TYPE_RSAKEY]);
        if (is_array($hostAll)) {
            foreach ($hostAll as $one) {

            }
        }
    }

    public function setConfig(HostBasic $host)
    {
        $host = $host->host_name;

        if(strpos($host->h))
        $host_name = $host->host_ip;
        $host = $host->host_name;

    }

}