<?php

namespace common\models\project;

use Yii;

/**
 * This is the model class for table "el_user_project_auth".
 *
 * @property int $id
 * @property int $project_id 关联用户
 * @property int $user_id
 * @property int $auth_mode
 * @property int $created_at
 * @property int $updated_at
 */
class UserProjectAuth extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_user_project_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'auth_mode', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
            'auth_mode' => 'Auth Mode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return UserProjectAuthQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserProjectAuthQuery(get_called_class());
    }
}
