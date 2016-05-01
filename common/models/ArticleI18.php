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
class ArticleI18 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'article_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'language_id', 'categoryI18_id'], 'integer'],
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
            'article_id' => 'Article ID',
            'categoryI18_id' => 'CategoryI18 ID',
            'language_id' => 'Language ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }
    public function getLanguage()
    {
        return $this->hasMany(Languages::className(),['id' => 'language_id']);
    }

    public function getCategoryI18()
    {
        return $this->hasOne(ArticleCategoryI18::className(), ['id' => 'categoryI18_id']);
    }

    public function getArticle()
    {
        return $this->hasMany(Article::className(),['id' => 'article_id']);
    }

    static public function getArticleI18byLangAndArticleId($lang_id, $id)
    {
        return ArticleI18::find()->where(['language_id' => $lang_id, 'article_id' => $id]) -> one();
    }
}
