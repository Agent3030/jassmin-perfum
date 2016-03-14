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
class PageTr extends PageI18
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



    static public function getPageTrbyPageId($id)
    {
        return PageTr::find()->where(['page_id' => $id]) -> one();
    }
}
