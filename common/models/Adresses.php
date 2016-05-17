<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adresses".
 *
 * @property integer $id
 * @property integer $partner_id
 * @property string $region
 * @property string $city
 * @property string $street
 * @property integer $house
 * @property integer $appartment
 * @property integer $index
 * @property integer $status
 */
class Adresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region', 'city', 'street', 'house'], 'required'],
            [['partner_id', 'house', 'appartment', 'index', 'status'], 'integer'],
            [['region', 'city', 'street'], 'string', 'max' => 128],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'partner_id' => 'Partner ID',
            'region' => 'Region',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'appartment' => 'Appartment',
            'index' => 'Index',
            'status' => 'Status',
        ];
    }

    public function getAdressesI18()
    {
        return $this->hasOne(AdressesI18::className(),['adress_id' => 'id']);
    }

    public function getPartners()
    {
        return $this->hasOne(Partners::className(),['id' => 'partner_id']);
    }

}
