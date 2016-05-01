<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statuses".
 *
 * @property integer $id
 * @property string $status_name
 *
 * @property Prices[] $prices
 */
class Statuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name'], 'required'],
            [['status_name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_name' => 'Status Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Prices::className(), ['status_id' => 'id']);
    }
    public function getStatusesI18()
    {
        return $this->hasOne(StatusesI18::className(),['status_id' => 'id']);
    }
}
