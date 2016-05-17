<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property integer $id
 * @property string $brand_name
 * @property integer $status
 *
 * @property Products[] $products
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['brand_name'], 'unique'],
            [['status'], 'integer'],
            [['brand_name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => 'Brand Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['brand_id' => 'id']);
    }
}
