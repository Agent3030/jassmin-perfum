<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partners_i18".
 *
 * @property integer $id
 * @property integer $partner_id
 * @property integer $language_id
 * @property string $short_name
 * @property string $full_name
 * @property string $prop_form
 */
class PartnersI18 extends \yii\db\ActiveRecord
{
    const lang = 'uk-UA';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short_name', 'prop_form'], 'required'],
            [['partner_id', 'language_id'], 'integer'],
            [['short_name', 'prop_form'], 'string', 'max' => 128],
            [['full_name'], 'string', 'max' => 1026]
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
            'language_id' => 'Language ID',
            'short_name' => 'Коротка назва',
            'full_name' => 'Повна назва',
            'prop_form' => 'Форма власності',
        ];
    }

    public function getPartners()
    {
        return $this->hasMany(Partners::className(),['id' => 'partner_id']);
    }

    public function getAdressesI18()
    {
        return $this->hasMany(AdressesI18::className(),['partnerI18_id' => 'id']);
    }
    static public function getPartnerI18ByLangAndPartnerId($id)
    {
        $lang = Languages::getLanguageByCode(self::lang)->id;
        return PartnersI18::find()->where(['language_id'=>$lang,'partner_id' => $id]) -> one();
    }
}
