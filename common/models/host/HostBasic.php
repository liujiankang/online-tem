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
            'id' => 'ID',
            'host_name' => 'Host Name',
            'host_ip' => 'Host Ip',
            'auth_type' => 'Auth Type',
            'user_pass' => 'User Pass',
            'user_name' => 'User Name',
            'rsa_key_pri' => 'Rsa Key Pri',
            'rsa_key_pub' => 'Rsa Key Pub',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
