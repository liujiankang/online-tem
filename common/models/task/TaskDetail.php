<?php

namespace common\models\task;

use Yii;

/**
 * This is the model class for table "el_task_detail".
 *
 * @property int $id
 * @property int $task_id
 * @property int $project_id
 * @property int $repo_id
 * @property string $base_branch
 * @property string $task_branch
 * @property string $base_commit_hash
 * @property string $task_commit_hash
 * @property string $dir_dealing
 * @property int $created_at
 * @property int $updated_at
 */
class TaskDetail extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_task_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'repo_id'], 'required'],
            [['task_id', 'project_id', 'repo_id', 'created_at', 'updated_at'], 'integer'],
            [['base_branch', 'task_branch', 'dir_dealing'], 'string', 'max' => 255],
            [['base_commit_hash', 'task_commit_hash'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'project_id' => 'Project ID',
            'repo_id' => 'Repo ID',
            'base_branch' => 'Base Branch',
            'task_branch' => 'Task Branch',
            'base_commit_hash' => 'Base Commit Hash',
            'task_commit_hash' => 'Task Commit Hash',
            'dir_dealing' => 'Dir Dealing',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
