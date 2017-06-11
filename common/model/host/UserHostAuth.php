<?php

namespace common\model\host;

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
class UserHostAuth extends \yii\db\ActiveRecord
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
            'id' => Yii::t('app', 'ID'),
            'host_id' => Yii::t('app', 'Host ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'auth_mode' => Yii::t('app', 'Auth Mode'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserHostAuthQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserHostAuthQuery(get_called_class());
    }
}
