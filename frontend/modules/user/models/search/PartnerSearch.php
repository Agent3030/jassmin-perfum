<?php

namespace frontend\modules\user\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Partners;

/**
 * PartnerSearch represents the model behind the search form about `common\models\Partners`.
 */
class PartnerSearch extends Partners
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reg_code', 'isVAT', 'VAT_code', 'user_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['short_name', 'full_name', 'prop_form'], 'safe'],
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

        if($this->isValues($params)) {
            $query = Partners::find() ->with(['partnersI18']);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            if (!($this->load($params) && $this->validate())) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id' => $this->id,
                'reg_code' => $this->reg_code,
                'isVAT' => $this->isVAT,
                'VAT_code' => $this->VAT_code,
                'user_id' => $this->user_id,
                'status_id' => $this->status_id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]);


            $query->andFilterWhere(['like', 'short_name', $this->short_name])
                ->andFilterWhere(['like', 'reg_code',   $models = $dataProvider->models]);



            return $dataProvider;
        }

        $query = Partners::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => 0,
            'reg_code' => 0,
            'isVAT' => 0,
            'VAT_code' => 0,
            'user_id' => 0,
            'status_id' => 0,
            'created_at' => 0,
            'updated_at' => 0,
        ]);


        $query->andFilterWhere(['like', 'short_name', ''])
            ->andFilterWhere(['like', 'reg_code',   '']);



        return $dataProvider;


    }

    private function isValues($params) {
        foreach ($params as $model) {
            foreach($model as $value ) {
                if ($value) {
                    return true;
                }
            }
            return false;
        }
    }
}
