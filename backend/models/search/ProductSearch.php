<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductSearch represents the model behind the search form about `common\models\Products`.
 */
class ProductSearch extends Products
{
    /**
     * @inheritdoc
     */
    public $price;
    public $add_price;

    public function rules()
    {
        return [
            [['id', 'brand_id', 'bulk_id', 'author_id', 'updater_id', 'created_at', 'updated_at', 'status', 'is_available', 'is_new', 'is_action'], 'integer'],
            [['price'],  'number'],
            [['add_price'],'string'],
            [['product_code', 'gender', 'product_name', 'description'], 'safe'],
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
        $query = Products::find()->with(['price'])->where(['status'=>1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'brand_id' => $this->brand_id,
            'bulk_id' => $this->bulk_id,
            'author_id' => $this->author_id,
            'price' => $this->price,
            'updater_id' => $this->updater_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'is_available' => $this->is_available,
            'is_new' => $this->is_new,
            'is_action' => $this->is_action,
        ]);

        $query->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
