<?php

namespace common\models\host;

use Yii;

/**
 * This is the model class for table "el_user_host_auth".
 *
 * @property int $id
 * @property int $host_id 关联用户
 * @property int $user_id
 * @property int $auth_mode r:4-w:2-x:1
 * @property int $created_at
 * @property int $updated_at
 */
class UserHostAuth extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_user_host_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['host_id', 'user_id', 'auth_mode', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'host_id' => 'Host ID',
            'user_id' => 'User ID',
            'auth_mode' => 'Auth Mode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
