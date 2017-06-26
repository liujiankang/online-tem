<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-26
 * Time: 下午9:11
 */

namespace common\help\message;

class MessageSenderHelper
{
    public function send(MessageSender $message){

        $message->getSender()->send();

    }
}
