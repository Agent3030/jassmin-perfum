<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace frontend\controllers;

use Yii;
use common\models\Page;
use common\models\PageI18;
use common\models\Languages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public $layout = 'page';
    public function actionView($slug)
    {
        $currentLanguage = Yii::$app->language;
        $lang = Languages::getLanguageByCode($currentLanguage);

        if ($lang->status) {

            $model = Page::find()->where(['slug' => $slug, 'status' => Page::STATUS_PUBLISHED])->one();
            if (!$model) {
                throw new NotFoundHttpException(Yii::t('frontend', 'Page not found'));

            }

            $viewFile = $model->view ?: 'view';
            return $this->render($viewFile, ['model' => $model]);


        } else {

            $model = Page::find()->where(['slug' => $slug, 'status' => Page::STATUS_PUBLISHED])->one();
            $modelI18 = $model->pageI18;

            if(!$model | !$modelI18){
                throw new NotFoundHttpException(Yii::t('frontend', 'Page not found'));
            }

            $viewFile = $model->view ?: 'view';
            return $this->render($viewFile, [
                'model' => $modelI18,
                'modelI18' => $modelI18]);
        }


    }
}
