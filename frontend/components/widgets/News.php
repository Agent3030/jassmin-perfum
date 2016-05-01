<?php
namespace app\components\widgets;
use common\models\Languages;
use common\models\Article;
use yii\data\ActiveDataProvider;

/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 01.04.16
 * Time: 22:37
 */


class News extends \yii\base\Widget
{
    public $currentLang;

    public $limit;

    public $dataProvider;



    public function init()
    {
        parent::init();
        $lang = Languages::getLanguageByCode($this->currentLang);
        if ($lang->status == true) {
            $query = Article::find()->orderBy(['id' => SORT_DESC])->limit($this->limit)->published();
            $this->dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);


        } else {

            $query = Article::find()->orderBy(['id' => SORT_DESC])->limit($this->limit)->published()->with(['articleI18']);
            $this->dataProvider= new ActiveDataProvider([
                'query' => $query,
            ]);

                  }
       }

    public function run()
    {

        return $this->render('news', ['dataProvider' => $this->dataProvider]);
    }
}