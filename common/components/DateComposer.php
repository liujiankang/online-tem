<?php
namespace common\component;

/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-21
 * Time: 下午9:44
 */
use yii\base\Component;
use Yii;

class DateComposer extends Component
{
    private $timeDiff;//virtralTime - time()
    public $nowDate;
    public $nowTime;

    public function init()
    {
        parent::init();
    }

    public function setTime($date, $time,$microtime)
    {
        if(empty($date)){
            $date=date('Y-m-d');
        }
        if(empty($time)){
            $time=date('H:i:s');
        }
        if(empty($microtime)){
            $microtime=microtime(true) % 1;
        }
        //debug_backtrace();
        Yii::trace([$time,$date,$microtime]);
    }

    public function getTime()
    {
        return $this->timeDiff + time();
    }
}