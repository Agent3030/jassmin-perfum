<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleI18;
use common\models\ArticleAttachment;
use common\models\Languages;
use frontend\models\search\ArticleI18Search;
use frontend\models\search\ArticleSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class ArticleController extends Controller
{
    /**
     * @return string
     */
    public $layout = 'article';
    public function actionIndex()
    {
        $currentLanguage = Yii::$app->language;
        $lang = Languages::getLanguageByCode($currentLanguage);
        if ($lang->status == true) {
            $searchModel = new ArticleSearch();
        } else {
            $searchModel = new ArticleI18Search();

        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC],

        ];
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        $currentLanguage = Yii::$app->language;
        $lang = Languages::getLanguageByCode($currentLanguage);

        if ($lang->status) {
            $model = Article::find()->published()->andWhere(['slug' => $slug])->one();
            if (!$model) {
                throw new NotFoundHttpException;
            }

            $viewFile = $model->view ?: 'view';
            return $this->render($viewFile, ['model' => $model]);



        } else {
            $model = Article::find()->published()->andWhere(['slug' => $slug])->one();
            $modelI18 = $model->articleI18;
            if(!$model | !$modelI18){
                throw new NotFoundHttpException;
            }
            $viewFile = $model->view ?: 'view';
            return $this->render($viewFile, [
                'model' => $model,
                'modelI18' => $modelI18
            ]);
        }
    }

    /**
     * @param $id
     * @return $this
     * @throws NotFoundHttpException
     * @throws \yii\web\HttpException
     */
    public function actionAttachmentDownload($id)
    {
        $model = ArticleAttachment::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }

        return Yii::$app->response->sendStreamAsFile(
            Yii::$app->fileStorage->getFilesystem()->readStream($model->path),
            $model->name
        );
    }
}
