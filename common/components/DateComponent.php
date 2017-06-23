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
    public $timeDiff;
    public $now;
    public $nowDate;
    public $nowTime;
    public function init()
    {
        parent::init();
    }

    public function getNowTime(){
        if($this->timeDiff);
    }

    public function setNowTime(){

    }

}