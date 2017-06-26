<?php

namespace common\models\task;

use Yii;

/**
 * This is the model class for table "el_task_basic".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $updated_at
 * @property int $created_at
 */
class TaskBasic extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_task_basic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'updated_at', 'created_at'], 'integer'],
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
            'status' => 'Status',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
