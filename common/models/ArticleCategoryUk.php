<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_category_i18".
 *
 * @property integer $id
 * @property integer $article_category_id
 * @property integer $language_id
 * @property string $title
 * @property string $body
 */
class ArticleCategoryUk extends ArticleCategoryI18
{
    const lang = 'uk-UA';

    static public function getArticleCategoryUkByArticleCategoryId($id)
    {
        $lang = Languages::getLanguageByCode(self::lang)->id;
        return ArticleCategoryUk::find()->where(['language_id'=> $lang,'article_category_id' => $id]) -> one();
    }
    static public function getArticleCategoriesUkByLang()
    {
        $lang_id = Languages::getLanguageByCode(self::lang)->id;
        return ArticleCategoryUk::find()->where(['language_id' => $lang_id]) -> all();
    }
}
