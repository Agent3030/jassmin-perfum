<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offices_i18".
 *
 * @property integer $id
 * @property integer $office_id
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $status
 */
class OfficesI18 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offices_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['office_id', 'region', 'city', 'street', 'status'], 'required'],
            [['office_id'], 'integer'],
            [['region', 'city', 'street'], 'string', 'max' => 128],
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
            'office_id' => 'Office ID',
            'region' => 'Region',
            'city' => 'City',
            'street' => 'Street',
            'status' => 'Status',
        ];
    }

    public function getOffices()
    {
        return $this->hasOne(Offices::className(),['id' => 'office_id']);
    }
}
