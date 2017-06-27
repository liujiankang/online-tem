<?php

namespace common\models\host;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\host\HostBasic;

/**
 * HostBasicSearch represents the model behind the search form of `common\models\host\HostBasic`.
 */
class HostBasicSearch extends HostBasic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'auth_type', 'created_at', 'updated_at'], 'integer'],
            [['host_name', 'host_ip', 'user_pass', 'user_name', 'rsa_key_pri', 'rsa_key_pub'], 'safe'],
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
        $query = HostBasic::find();

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
            'auth_type' => $this->auth_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'host_name', $this->host_name])
            ->andFilterWhere(['like', 'host_ip', $this->host_ip])
            ->andFilterWhere(['like', 'user_pass', $this->user_pass])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'rsa_key_pri', $this->rsa_key_pri])
            ->andFilterWhere(['like', 'rsa_key_pub', $this->rsa_key_pub]);

        return $dataProvider;
    }
}
