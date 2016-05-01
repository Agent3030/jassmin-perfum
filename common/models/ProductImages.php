<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_images".
 *
 * @property integer $id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $order
 * @property integer $product_id
 *
 * @property Products $product
 */
class ProductImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'base_url', 'type', 'product_id'], 'required'],
            [['size', 'order', 'product_id'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'order' => 'Order',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
