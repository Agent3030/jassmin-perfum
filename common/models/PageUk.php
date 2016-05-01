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
class PageUk extends PageI18
{

    /**
     * @inheritdoc
     */
    const lang = 'uk-UA';
    static public function getPageUkbyPageId($id)
    {
        return PageUk::find()->where(['page_id' => $id]) -> one();
    }
    static public function getPageUkByLangAndPageId($id)
    {
        $lang = Languages::getLanguageByCode(self::lang)->id;
        return PageUk::find()->where(['language_id'=>$lang,'page_id' => $id]) -> one();
    }
}
