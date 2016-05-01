<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bulks".
 *
 * @property integer $id
 * @property string $bulk
 * @property integer $status
 *
 * @property Prices[] $prices
 * @property Products[] $products
 */
class Bulks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bulks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bulk'], 'required'],
            [['status'], 'integer'],
            [['bulk'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bulk' => 'Bulk',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Prices::className(), ['bulk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['bulk_id' => 'id']);
    }
}
