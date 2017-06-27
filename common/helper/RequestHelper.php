<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-26
 * Time: 下午10:27
 */

namespace common\helper;

use Yii;

class RequestHelper
{

    public static function get($name, $default)
    {
        return Yii::$app->getRequest()->get($name, $default);
    }

    public static function post($name, $default)
    {
        return Yii::$app->getRequest()->post($name, $default);
    }

}