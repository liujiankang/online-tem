<?php

namespace common\models\task;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\task\TaskCommand;

/**
 * TaskCommandSearch represents the model behind the search form of `common\models\task\TaskCommand`.
 */
class TaskCommandSearch extends TaskCommand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'task_basic_id', 'task_detail_id', 'host_id', 'is_before_task', 'status', 'updated_at', 'created_at'], 'integer'],
            [['command', 'result'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TaskCommand::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'task_basic_id' => $this->task_basic_id,
            'task_detail_id' => $this->task_detail_id,
            'host_id' => $this->host_id,
            'is_before_task' => $this->is_before_task,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'command', $this->command])
            ->andFilterWhere(['like', 'result', $this->result]);

        return $dataProvider;
    }
}
