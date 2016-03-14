<?php
namespace app\components\widgets;
class Login  extends \yii\base\Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('login', ['model' => new $this->model]);
    }
}
