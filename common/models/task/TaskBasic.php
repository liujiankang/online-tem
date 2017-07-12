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
    const TASK_STATUS_CREATE = 1;
    const TASK_STATUS_READY = 2;
    const TASK_STATUS_CHECK = 3;
    const TASK_STATUS_ONLINEING = 4;
    const TASK_STATUS_ONLINED = 4;
    const TASK_STATUS_ONLINE_TEST = 5;
    const TASK_STATUS_MERGE_REPO = 6;
    const TASK_STATUS_FINISH = 7;

    static $taskStatusDes=[
        '刚创建任务',
        '任务可以上线',
        '代码审核中',
        '正在上线',
        '上线完成',
        '线上测试阶段',
        '合并主分支',
        '任务完成',
    ];

    public function getTaskStatusDes(){

    }

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
