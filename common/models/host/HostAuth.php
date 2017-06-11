<?php

namespace common\models\host;

use Yii;

/**
 * This is the model class for table "host_auth".
 *
 * @property integer $id
 * @property integer $host_id
 * @property integer $user_id
 * @property integer $auth_type
 */
class HostAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'host_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['host_id', 'user_id', 'auth_type'], 'integer'],
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
            'auth_type' => 'Auth Type',
        ];
    }
}
