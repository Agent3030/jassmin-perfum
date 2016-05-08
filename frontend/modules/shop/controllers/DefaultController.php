<?php

namespace frontend\modules\shop\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{
    public $layout ='main';
    public function actionIndex()
    {
        print_r(Yii::$app->user->identity->userProfile);
        return $this->render('index');
    }
}
