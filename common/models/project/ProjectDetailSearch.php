<?php

namespace common\models\project;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\project\ProjectDetail;

/**
 * ProjectDetailSearch represents the model behind the search form of `common\models\project\ProjectDetail`.
 */
class ProjectDetailSearch extends ProjectDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'host_id', 'created_at', 'updated_at', 'is_master'], 'integer'],
            [['web_root', 'log_root', 'web_back', 'log_back'], 'safe'],
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
        $query = ProjectDetail::find();

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
            'project_id' => $this->project_id,
            'host_id' => $this->host_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_master' => $this->is_master,
        ]);

        $query->andFilterWhere(['like', 'web_root', $this->web_root])
            ->andFilterWhere(['like', 'log_root', $this->log_root])
            ->andFilterWhere(['like', 'web_back', $this->web_back])
            ->andFilterWhere(['like', 'log_back', $this->log_back]);

        return $dataProvider;
    }
}
