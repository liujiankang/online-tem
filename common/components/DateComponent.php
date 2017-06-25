<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-21
 * Time: 上午9:13
 */

namespace common\components;


use yii\base\Component;

class DateComponent extends Component
{
    private $timeDiff;//virtralTime - time()
    public $initTime;
    public $nowDate;
    public $nowTime;

    public function init()
    {
        parent::init();
        $this->setNowTime($this->nowDate, $this->nowTime, null);
    }

    public function getNowTime()
    {
        return $this->timeDiff + time();
    }

    public function setNowTime($date, $time, $microtime)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        if (empty($time)) {
            $time = date('H:i:s');
        }
        if (empty($microtime)) {
            $microtime = microtime(true) % 1;
        }
        //debug_backtrace();
        Yii::trace([$time, $date, $microtime]);
        $setTime = strtotime($date . ' ' . $time);
        $this->initTime = time();
        $this->timeDiff = $setTime - $this->initTime;
        return true;
    }
}