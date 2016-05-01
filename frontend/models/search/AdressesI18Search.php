<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AdressesI18;

/**
 * AdressesSearch represents the model behind the search form about `common\models\Adresses`.
 */
class AdressesI18Search extends AdressesI18
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['id','adress_id', 'partnerI18_id', 'language_id'], 'integer'],
            [['region', 'city', 'street'], 'safe'],
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
        $query = AdressesI18::find()->with(['partnersI18', 'adresses']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'adress_id' => $this->adress_id,
            'partnerI18_id' => $this->partnerI18_id,
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street]);

        return $dataProvider;
    }
}