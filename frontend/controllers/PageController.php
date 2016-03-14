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
    public function actionView($slug)
    {
        $currentLanguage = Yii::$app->language;
        $lang = Languages::getLanguageByCode($currentLanguage);

        if ($lang->id === 1) {

            $model = Page::find()->where(['slug' => $slug, 'status' => Page::STATUS_PUBLISHED])->one();
            if (!$model) {
                throw new NotFoundHttpException(Yii::t('frontend', 'Page not found'));

            }

            $viewFile = $model->view ?: 'view';
            return $this->render($viewFile, ['model' => $model]);


        } else {

            $model = Page::find()->where(['slug' => $slug, 'status' => Page::STATUS_PUBLISHED])->one();
            $modelI18 = PageI18::getPageI18byLangAndPageId($lang->id, $model->id);

            if(!$model | !$modelI18){
                throw new NotFoundHttpException(Yii::t('frontend', 'Page not found'));
            }

            $viewFile = $model->view ?: 'view';
            return $this->render($viewFile, ['modelI18' => $modelI18]);
        }


    }
}
