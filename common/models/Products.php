<?php

namespace common\models;

use Yii;
use common\models\query\ArticleQuery;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $product_code
 * @property string $gender
 * @property integer $brand_id
 * @property string $product_name
 * @property string $description
 * @property integer $bulk_id
 * @property integer $author_id
 * @property integer $price_id
 * @property integer $updater_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $is_available
 * @property integer $is_new
 * @property integer $is_action
 *
 * @property ProductImages[] $productImages
 * @property User $author
 * @property Brands $brand
 * @property Bulks $bulk
 * @property Prices $price
 * @property User $updater
 */
class Products extends \yii\db\ActiveRecord
{

    public $product_images;
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class'=>BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => 'updater_id',

            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'product_images',
                'multiple' => true,
                'uploadRelation' => 'productImages',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_code', 'gender', 'product_name'], 'required'],
            [['brand_id', 'bulk_id', 'author_id', 'price_id', 'updater_id', 'created_at', 'updated_at', 'status', 'is_available', 'is_new', 'is_action'], 'integer'],
            [['description'], 'string'],
            [['product_code', 'product_name'], 'string', 'max' => 128],
            [['gender'], 'string', 'max' => 32],
            [['product_images'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_code' => 'Product Code',
            'gender' => 'Gender',
            'brand_id' => 'Brand ID',
            'product_name' => 'Product Name',
            'description' => 'Description',
            'bulk_id' => 'Bulk ID',
            'author_id' => 'Author ID',
            'price_id' => 'Price ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'is_available' => 'Is Available',
            'is_new' => 'Is New',
            'is_action' => 'Is Action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImages::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
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
    public function getPrice()
    {
        return $this->hasOne(Prices::className(), ['id' => 'price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }
}
