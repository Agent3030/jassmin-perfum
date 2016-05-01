<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $status
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'status'], 'required'],
            [['status'], 'integer'],
            [['code', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }

    public function getPageI18()
    {
       return $this -> hasOne(PageI18::className(), ['language_id' => 'id']);
    }

    public function getArticleI18()
    {
        return $this -> hasOne(ArticleI18::className(), ['language_id' => 'id']);
    }

    public function getArticleCategoryI18()
    {
        return $this -> hasOne(ArticleCategoryI18::className(), ['language_id' => 'id']);
    }

    static public function getLanguageByCode($code)
    {
        return Languages::find()->where(['code'=>$code])->one();
    }
}
