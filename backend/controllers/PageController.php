<?php

namespace backend\controllers;

use common\models\PageI18;
use Yii;
use common\models\Page;
use common\models\PageTr;
use common\models\PageUk;
use common\models\Languages;
use yii\base\Model;
use backend\models\search\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();
        $modelTr = new PageTr();
        $modelUk = new PageUk();

        if ($model->load(Yii::$app->request->post()) && $modelTr->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post())&& Model::validateMultiple([$model, $modelTr, $modelUk])) {

            $model->save(false);

            $modelTr->page_id = $model->id;
            $modelTr->save(false);
            $modelUk->page_id = $model->id;
            $modelUk->save(false);

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelTr' => $modelTr,
                'modelUk'=> $modelUk
            ]);
        }
    }





    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $turkLang = Languages::getLanguageByCode('tr-TR');
        $ukrLang = Languages::getLanguageByCode('uk-UA');
        $modelTr = PageI18::getPageI18byLangAndPageId($turkLang->id,$model->id);
        $modelUk = PageI18::getPageI18byLangAndPageId($ukrLang->id,$model->id);


        if ($model->load(Yii::$app->request->post()) && $modelTr->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $modelTr, $modelUk])) {


                $model->save(false);
                $modelTr->save(false);
                $modelUk->save(false);
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelTr' => $modelTr,
                    'modelUk' => $modelUk
                ]);
            }
        }



    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelI18 = $model->pageI18;
        $modelI18->delete();
        $model->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
