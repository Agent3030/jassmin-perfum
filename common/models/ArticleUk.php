<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_i18".
 *
 * @property integer $id
 * @property integer $article_id
 * @property integer $language_id
 * @property string $title
 * @property string $body
 */
class ArticleUk extends ArticleI18
{
const lang = 'uk-UA';
    static public function getArticleCategoryTrByArticleCategoryId($id)
    {
        return ArticleUk::find()->where(['article_category_id' => $id]) -> one();
    }
    static public function getArticleUkByLangAndArticleId($id)
    {
        $lang = Languages::getLanguageByCode(self::lang)->id;
        return ArticleUk::find()->where(['language_id'=>$lang,'article_id' => $id]) -> one();
    }
    public function getArticle()
    {
        return $this->hasMany(Article::className(),['id' => 'article_id']);
    }


}
