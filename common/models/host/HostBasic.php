<?php

namespace common\models\host;

use Yii;

/**
 * This is the model class for table "host_basic".
 *
 * @property integer $id
 * @property string $host_name
 * @property string $host_ip
 * @property string $auth_type
 * @property string $user_pass
 * @property string $user_name
 */
class HostBasic extends \yii\db\ActiveRecord
{
    const AUTH_TYPE_PASSWORD = 1;
    const AUTH_TYPE_RSA_KEY = 1;
    static $authTypeName = [self::AUTH_TYPE_PASSWORD => 'pass', self::AUTH_TYPE_RSA_KEY => 'rsa_key'];


    static function getAuthTypeName($type)
    {
        return self::$authTypeName[$type];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'host_basic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['host_name', 'host_ip'], 'string', 'max' => 50],
            [['auth_type'], 'string', 'max' => 10],
            [['user_pass'], 'string', 'max' => 2000],
            [['user_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'host_name' => 'Host Name',
            'host_ip' => 'Host Ip',
            'auth_type' => 'Auth Type',
            'user_pass' => 'User Pass',
            'user_name' => 'User Name',
        ];
    }
}
