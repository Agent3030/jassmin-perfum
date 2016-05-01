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
class ArticleCategoryI18 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category_i18';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_category_id', 'language_id'], 'integer'],
            [['title'], 'required'],
            [['parent_id'], 'string'],
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
            'article_category_id' => 'Article Category ID',
            'language_id' => 'Language ID',
            'title' => 'Title',
            'parent_id' => Yii::t('common', 'Parent Category')
        ];
    }

    public function getArticlesI18()
    {
        return $this->hasMany(ArticleI18::className(), ['categoryI18_id' => 'id']);
    }

    public function getArticleCategory()
    {
        return $this->hasMany(Article::className(),['id' => 'article_category_id']);
    }

    static public function getArticleCategoryI18byLangAndArticleCategoryId($lang_id, $id)
    {
        return ArticleCategoryI18::find()->where(['language_id' => $lang_id, 'article_category_id' => $id]) -> one();
    }
}
