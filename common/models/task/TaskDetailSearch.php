<?php

namespace common\models\task;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\task\TaskDetail;

/**
 * TaskDetailSearch represents the model behind the search form of `common\models\task\TaskDetail`.
 */
class TaskDetailSearch extends TaskDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'task_id', 'project_id', 'repo_id', 'created_at', 'updated_at'], 'integer'],
            [['base_branch', 'task_branch', 'base_commit_hash', 'task_commit_hash', 'dir_dealing'], 'safe'],
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
        $query = TaskDetail::find();

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
            'task_id' => $this->task_id,
            'project_id' => $this->project_id,
            'repo_id' => $this->repo_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'base_branch', $this->base_branch])
            ->andFilterWhere(['like', 'task_branch', $this->task_branch])
            ->andFilterWhere(['like', 'base_commit_hash', $this->base_commit_hash])
            ->andFilterWhere(['like', 'task_commit_hash', $this->task_commit_hash])
            ->andFilterWhere(['like', 'dir_dealing', $this->dir_dealing]);

        return $dataProvider;
    }
}
