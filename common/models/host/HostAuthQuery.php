<?php

namespace common\models\host;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\host\HostAuth;

/**
 * HostAuthQuery represents the model behind the search form about `common\models\host\HostAuth`.
 */
class HostAuthQuery extends HostAuth
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'host_id', 'user_id', 'auth_type'], 'integer'],
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
        $query = HostAuth::find();

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
            'host_id' => $this->host_id,
            'user_id' => $this->user_id,
            'auth_type' => $this->auth_type,
        ]);

        return $dataProvider;
    }
}
