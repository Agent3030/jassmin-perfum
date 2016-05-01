<?php
namespace app\components\widgets;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Languages;
use common\models\Adresses;
use common\models\AdressesI18;
use Yii;




/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 02.04.16
 * Time: 20:21
 */
class RegionSearch extends \yii\base\Widget
{
    public $model;
    public $item;

    public function init()
    {
        parent::init();
        $currentLanguage = Yii::$app->language;
        $lang = Languages::getLanguageByCode($currentLanguage);

        if($lang->status) {
            $this->model = Adresses::find()->all();
            $this->item = ArrayHelper::map($this->model, 'city', 'region');

        } else  {
            $this->model = AdressesI18::find()->all();
            $this->item = ArrayHelper::map($this->model, 'city','region');
        }
    }

    public function run()
    {
        return $this->render('regionSearch', ['model' => $this->model, 'item' => $this->item]);
    }
}