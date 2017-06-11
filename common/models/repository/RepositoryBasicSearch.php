<?php

namespace common\models\repository;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\repository\RepositoryBasic;

/**
 * RepositoryBasicSearch represents the model behind the search form of `common\models\repository\RepositoryBasic`.
 */
class RepositoryBasicSearch extends RepositoryBasic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'url', 'type', 'created_at', 'updated_at'], 'integer'],
            [['name', 'auth_type', 'user_name', 'user_pass', 'webdir_repodir_map'], 'safe'],
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
        $query = RepositoryBasic::find();

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
            'url' => $this->url,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'auth_type', $this->auth_type])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_pass', $this->user_pass])
            ->andFilterWhere(['like', 'webdir_repodir_map', $this->webdir_repodir_map]);

        return $dataProvider;
    }
}
