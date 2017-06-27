<?php

namespace common\models\repository;

use Yii;

/**
 * This is the model class for table "el_repository_monitor".
 *
 * @property int $id
 * @property int $repo_id
 * @property string $branch_tag
 * @property string $last_commit
 * @property string $last_commit_message
 * @property int $last_monitor_time
 * @property string $warned_commit
 * @property int $warned_time
 * @property int $created_at
 * @property int $updated_at
 * @property int $warned_interval
 * @property int $warned_end_time
 */
class RepositoryMonitor extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_repository_monitor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'repo_id', 'branch_tag'], 'required'],
            [['id', 'repo_id', 'last_monitor_time', 'warned_time', 'created_at', 'updated_at', 'warned_interval', 'warned_end_time'], 'integer'],
            [['branch_tag', 'last_commit', 'last_commit_message', 'warned_commit'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'repo_id' => 'Repo ID',
            'branch_tag' => 'Branch Tag',
            'last_commit' => 'Last Commit',
            'last_commit_message' => 'Last Commit Message',
            'last_monitor_time' => 'Last Monitor Time',
            'warned_commit' => 'Warned Commit',
            'warned_time' => 'Warned Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'warned_interval' => 'Warned Interval',
            'warned_end_time' => 'Warned End Time',
        ];
    }


    public function getRepository()
    {
        return RepositoryBasic::findOne($this->repo_id);
    }
}
