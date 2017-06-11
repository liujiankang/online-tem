<?php

namespace common\models\repository;

use Yii;

/**
 * This is the model class for table "el_repository_basic".
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string $url
 * @property int $type svn/git
 * @property string $auth_type by username-password 1 recomend by rsa-key of web user 2
 * @property string $user_name
 * @property string $user_pass
 * @property int $created_at
 * @property int $updated_at
 * @property string $webdir_repodir_map
 */
class RepositoryBasic extends \common\models\BaseModel
{
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
            [['project_id', 'type', 'created_at', 'updated_at'], 'integer'],
            [['url'], 'required'],
            [['name', 'auth_type', 'user_name', 'user_pass', 'webdir_repodir_map'], 'string', 'max' => 45],
            [['url'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'url' => 'Url',
            'type' => 'Type',
            'auth_type' => 'Auth Type',
            'user_name' => 'User Name',
            'user_pass' => 'User Pass',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'webdir_repodir_map' => 'Webdir Repodir Map',
        ];
    }
}
