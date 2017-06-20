<?php

namespace common\models\repository;

use Yii;

/**
 * This is the model class for table "el_repository_basic".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $type svn/git
 * @property string $auth_type by username-password 1 recomend by rsa-key of web user 2
 * @property string $user_name
 * @property string $user_pass
 * @property int $created_at
 * @property int $updated_at
 * @property string $local_path
 */
class RepositoryBasic extends \common\models\BaseModel
{
    const AUTH_TYPE_PASSWORD = 1;
    const AUTH_TYPE_RSAKEY = 2;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_repository_basic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['name', 'auth_type', 'user_name', 'user_pass'], 'string', 'max' => 45],
            [['url', 'local_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'type' => 'Type',
            'auth_type' => 'Auth Type',
            'user_name' => 'User Name',
            'user_pass' => 'User Pass',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'local_path' => 'Local Path',
        ];
    }
}
