<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_i18".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $language_id
 * @property string $title
 * @property string $body
 */
class PageI18 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'language_id'], 'integer'],
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'language_id' => 'Language ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    public function getLanguage()
    {
        return $this->hasMany(Languages::className(),['id' => 'language_id']);
    }

    public function getPage()
    {
        return $this->hasMany(Page::className(),['id' => 'page_id']);
    }

    static public function getPageI18byLangAndPageId($lang_id, $id)
    {
        return PageI18::find()->where(['language_id' => $lang_id, 'page_id' => $id]) -> one();
    }
}
