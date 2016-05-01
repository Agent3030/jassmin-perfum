<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offices;

/**
 * OfficesSearch represents the model behind the search form about `common\models\Offices`.
 */
class OfficesSearch extends Offices
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'house', 'appartment'], 'integer'],
            [['region', 'city', 'street', 'index', 'tel', 'status'], 'safe'],
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
        $query = Offices::find();

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
            'house' => $this->house,
            'appartment' => $this->appartment,
        ]);

        $query->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'index', $this->index])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
