<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-26
 * Time: 下午9:11
 */

namespace common\help\message;

class MessageSender
{
    public $sender;

    public function send()
    {
        $message=$this->getMessage();
        var_dump($message);
    }

    public function getMessage()
    {
        return 'message';
    }

    public function getSender(){
        return $this;
    }
}
