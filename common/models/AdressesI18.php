<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adresses_i18".
 *
 * @property integer $id
 * @property integer $adress_id
 * @property integer $language_id
 * @property string $region
 * @property string $city
 * @property string $street
 */
class AdressesI18 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adresses_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region', 'city', 'street'], 'required'],
            [['adress_id', 'partnerI18_id', 'language_id'], 'integer'],
            [['region', 'city', 'street'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adress_id' => 'Adress ID',
            'partnerI18_id' => 'Partner ID',
            'language_id' => 'Language ID',
            'region' => 'Region',
            'city' => 'City',
            'street' => 'Street',
        ];
    }
    public function getAdresses()
    {
        return $this->hasOne(Adresses::className(),['id' => 'adress_id']);
    }

    public function getPartnersI18()
    {
        return $this->hasOne(PartnersI18::className(),['id' => 'partnerI18_id']);
    }
}
