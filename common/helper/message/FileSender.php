<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-26
 * Time: 下午9:25
 */

namespace common\help\message;

use Yii;

class FileSender extends MessageSender
{
    public $sender;
    public $path = '@common\data\message';
    public $message;

    public function send()
    {
        $message = $this->getMessage();
        $fileName = Yii::getAlias($this->path . DIRECTORY_SEPARATOR . 'message_' . date('Y-m-d') . '.txt');
        $fileHandle = fopen($fileName, 'a+');
        fwrite($fileHandle, $message);
        fclose($fileHandle);
        return true;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return true;
    }

    public function getSender()
    {
        return $this;
    }
}