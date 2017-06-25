<?php

namespace common\models\repository;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\repository\RepositoryMonitor;

/**
 * RepositoryMonitorSearch represents the model behind the search form of `common\models\repository\RepositoryMonitor`.
 */
class RepositoryMonitorSearch extends RepositoryMonitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'repo_id', 'last_monitor_time', 'warned_time', 'created_at', 'updated_at', 'warned_interval', 'warned_end_time'], 'integer'],
            [['branch_tag', 'last_commit', 'last_commit_message', 'warned_commit'], 'safe'],
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
        $query = RepositoryMonitor::find();

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
            'repo_id' => $this->repo_id,
            'last_monitor_time' => $this->last_monitor_time,
            'warned_time' => $this->warned_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'warned_interval' => $this->warned_interval,
            'warned_end_time' => $this->warned_end_time,
        ]);

        $query->andFilterWhere(['like', 'branch_tag', $this->branch_tag])
            ->andFilterWhere(['like', 'last_commit', $this->last_commit])
            ->andFilterWhere(['like', 'last_commit_message', $this->last_commit_message])
            ->andFilterWhere(['like', 'warned_commit', $this->warned_commit]);

        return $dataProvider;
    }
}
