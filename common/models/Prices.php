<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $bulk_id
 * @property integer $status_id
 * @property double $prices
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 *
 * @property Bulks $bulk
 * @property Statuses $status0
 * @property Products $product
 */
class Prices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'bulk_id', 'status_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['prices'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'bulk_id' => 'Bulk ID',
            'status_id' => 'Status ID',
            'prices' => 'Prices',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBulk()
    {
        return $this->hasOne(Bulks::className(), ['id' => 'bulk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
