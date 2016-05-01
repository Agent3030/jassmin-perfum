<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offices".
 *
 * @property integer $id
 * @property string $region
 * @property string $city
 * @property string $street
 * @property integer $house
 * @property integer $appartment
 * @property string $index
 * @property string $tel
 * @property string $status
 */
class Offices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region', 'city', 'street', 'house', 'status'], 'required'],
            [['house', 'appartment'], 'integer'],
            [['region', 'city', 'street'], 'string', 'max' => 128],
            [['index'], 'string', 'max' => 5],
            [['tel'], 'string', 'max' => 14],
            [['status'], 'string', 'max' => 28]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region' => 'Region',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'appartment' => 'Appartment',
            'index' => 'Index',
            'tel' => 'Tel',
            'status' => 'Status',
        ];
    }

    public function getOfficesI18()
    {
        return $this->hasOne(OfficesI18::className(),['office_id' => 'id']);
    }
}
