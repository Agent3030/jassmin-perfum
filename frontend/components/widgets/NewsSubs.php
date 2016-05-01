<?php
namespace app\components\widgets;
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 02.04.16
 * Time: 20:21
 */
class NewsSubs extends \yii\base\Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('newsSubs', ['model' => new $this->model]);
    }
}


