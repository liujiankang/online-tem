<?php

namespace common\models\host;

use Yii;

/**
 * This is the model class for table "el_host_basic".
 *
 * @property int $id
 * @property string $host_name
 * @property string $host_ip
 * @property int $auth_type
 * @property string $user_pass
 * @property string $user_name
 * @property string $rsa_key_pri
 * @property string $rsa_key_pub
 * @property int $created_at
 * @property int $updated_at
 */
class HostBasic extends \common\models\BaseModel
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
        return 'el_host_basic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['host_ip'], 'required'],
            [['auth_type', 'created_at', 'updated_at'], 'integer'],
            [['host_name', 'host_ip'], 'string', 'max' => 50],
            [['user_pass'], 'string', 'max' => 100],
            [['user_name'], 'string', 'max' => 45],
            [['rsa_key_pri', 'rsa_key_pub'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'host_name' => Yii::t('app', 'Host Name'),
            'host_ip' => Yii::t('app', 'Host Ip'),
            'auth_type' => Yii::t('app', 'Auth Type'),
            'user_pass' => Yii::t('app', 'User Pass'),
            'user_name' => Yii::t('app', 'User Name'),
            'rsa_key_pri' => Yii::t('app', 'Rsa Key Pri'),
            'rsa_key_pub' => Yii::t('app', 'Rsa Key Pub'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return HostBasicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HostBasicQuery(get_called_class());
    }
}
