<?php

namespace common\models\project;

use Yii;

/**
 * This is the model class for table "el_project_detail".
 *
 * @property int $project_id
 * @property int $host_id
 * @property string $web_root
 * @property string $log_root
 * @property string $web_back
 * @property string $log_back
 * @property int $created_at
 * @property int $updated_at
 */
class ProjectDetail extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'el_project_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['host_id', 'web_root'], 'required'],
            [['host_id', 'created_at', 'updated_at'], 'integer'],
            [['web_root', 'log_root', 'web_back', 'log_back'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'host_id' => 'Host ID',
            'web_root' => 'Web Root',
            'log_root' => 'Log Root',
            'web_back' => 'Web Back',
            'log_back' => 'Log Back',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectDetailQuery(get_called_class());
    }
}
