<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statuses_i18".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $status_id
 * @property string $status_name
 */
class StatusesI18 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    const lang = 'uk-UA';
    public static function tableName()
    {
        return 'statuses_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id', 'status_id', 'status_name'], 'required'],
            [['lang_id', 'status_id'], 'integer'],
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
            'lang_id' => 'Lang ID',
            'status_id' => 'Status ID',
            'status_name' => 'Status Name',
        ];
    }

    public function getStatuses()
    {
        return $this->hasMany(Statuses::className(),['id' => 'status_id']);
    }

    static public function getStatusI18ByLangAndStatusId($id)
    {
        $lang = Languages::getLanguageByCode(self::lang)->id;
        return StatusesI18::find()->where(['language_id'=>$lang,'status_id' => $id]) -> one();
    }
}
