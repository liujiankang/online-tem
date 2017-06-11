<?php

namespace common\models\project;

use Yii;

/**
 * This is the model class for table "el_project_basic".
 *
 * @property int $id
 * @property string $name
 * @property int $updated_at
 * @property int $created_at
 */
class ProjectBasic extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_project_basic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['updated_at', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
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
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
