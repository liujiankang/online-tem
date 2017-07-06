<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-7-6
 * Time: 下午10:55
 */

namespace common\services\ssh;


class ScpService
{
    public $connection;

    public function init($connection)
    {
        $this->connection = $connection;
    }

    public function upFile(){

    }

    public function downFile(){

    }
}