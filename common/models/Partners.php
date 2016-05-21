<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $slug
 * @property string $short_name
 * @property string $full_name
 * @property integer $reg_code
 * @property string $prop_form
 * @property integer $isVAT
 * @property integer $VAT_code
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Partners extends \yii\db\ActiveRecord
{
    public $partner_attachements;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),

            [
                'class' => UploadBehavior::className(),
                'attribute' => 'partner_attachements',
                'multiple' => true,
                'uploadRelation' => 'attachements',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],

        ];
    }
    public function rules()
    {
        return [
            [['short_name', 'reg_code', 'prop_form', 'isVAT'], 'required'],
            [['reg_code', 'isVAT', 'VAT_code', 'user_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['short_name', 'prop_form'], 'string', 'max' => 128],
            [['full_name'], 'string', 'max' => 1026],
            [['short_name', 'full_name', 'reg_code', 'VAT_code'], 'unique']


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'short_name' => 'Short Name',
            'full_name' => 'Full Name',
            'reg_code' => 'Reg Code',
            'prop_form' => 'Prop Form',
            'isVAT' => 'Is Vat',
            'VAT_code' => 'Vat Code',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getPartnersI18()
    {
        return $this->hasOne(PartnersI18::className(),['partner_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasMany(User::className(),['id' => 'user_id']);
    }
    public function getUserProfile()
    {
        return $this->hasMany(Partners::className(),['partner_id' => 'id']);
    }
    public function getAttachements()
    {
        return $this->hasMany(PartnersAttachements::className(),['partner_id' => 'id']);
    }

    public function getAdresses()
    {
        return $this->hasMany(Adresses::className(),['partner_id' => 'id']);
    }
    public function getAdressesI18()
    {
        return $this->hasOne(AdressesI18::className(),['id' => 'partner_id']);
    }
    public function getStatus()
    {
        return $this->hasMany(Statuses::className(),['id' => 'status_id']);
    }
}
