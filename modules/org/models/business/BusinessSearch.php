<?php

namespace app\modules\org\models\business;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\org\models\business\Business;

/**
 * BusinessSearch represents the model behind the search form of `app\modules\org\models\business\Business`.
 */
class BusinessSearch extends Business
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'bus_cat', 'status'], 'integer'],
            [['bus_name', 'bus_username', 'bus_qrcode', 'bus_number', 'bus_token', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Business::find();

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
            'user_id' => $this->user_id,
            'bus_cat' => $this->bus_cat,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bus_name', $this->bus_name])
            ->andFilterWhere(['like', 'bus_username', $this->bus_username])
            ->andFilterWhere(['like', 'bus_qrcode', $this->bus_qrcode])
            ->andFilterWhere(['like', 'bus_number', $this->bus_number])
            ->andFilterWhere(['like', 'bus_token', $this->bus_token]);

        return $dataProvider;
    }
}
