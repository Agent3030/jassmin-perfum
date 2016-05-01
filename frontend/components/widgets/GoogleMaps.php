<?php
namespace app\components\widgets;

use Yii;

/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 07.04.16
 * Time: 23:29
 */
class GoogleMaps extends \yii\base\Widget
{
    public $zoom;

    public $key;

    public $lang;

    public $markers=[];

    public $size = [];

    public $lntlng = [];

    public $response = [];

    public function init()
    {
        parent::init();

        $this->lang = (Yii::$app->language == 'en-US') ? 'en' : 'uk';

        $this->response = [
                    'lntlng' => $this->lntlng,
                    'zoom'=>$this->zoom,
                    'size'=>(object)$this->size,
                    'key'=>($this->key) ? $this->key : Yii::$app->params['googleApiKey'],
                    'lang' => $this->lang,
                    'markers'=>(object)$this->markers
        ];
        $this->response = (object)$this->response;

    }

    public function run()
    {

        return $this->render('googleMaps', ['response' => $this->response]);
    }
}