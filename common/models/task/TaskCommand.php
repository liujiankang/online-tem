<?php

namespace common\models\task;

use Yii;

/**
 * This is the model class for table "el_task_command".
 *
 * @property int $id
 * @property int $task_basic_id
 * @property int $task_detail_id
 * @property int $host_id
 * @property int $is_before_task
 * @property string $command
 * @property string $result
 * @property int $status
 * @property int $updated_at
 * @property int $created_at
 */
class TaskCommand extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_task_command';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_basic_id'], 'required'],
            [['task_basic_id', 'task_detail_id', 'host_id', 'is_before_task', 'status', 'updated_at', 'created_at'], 'integer'],
            [['command', 'result'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_basic_id' => 'Task Basic ID',
            'task_detail_id' => 'Task Detail ID',
            'host_id' => 'Host ID',
            'is_before_task' => 'Is Before Task',
            'command' => 'Command',
            'result' => 'Result',
            'status' => 'Status',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
