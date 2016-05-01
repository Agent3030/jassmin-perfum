<?php

namespace backend\controllers;

use Yii;
use common\models\Article;
use common\models\ArticleI18;
use common\models\ArticleUk;
use common\models\Languages;
use backend\models\search\ArticleSearch;
use \common\models\ArticleCategory;
use common\models\ArticleCategoryUk;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ]
            ]
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder'=>['published_at'=>SORT_DESC]
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $modelUk = new ArticleUk();
        if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post())&& Model::validateMultiple([$model,$modelUk])) {

            $model->save(false);

            $modelUk->article_id = $model->id;
            $modelUk->save(false);

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUk'=> $modelUk,
                'categories' => ArticleCategory::find()->active()->all(),
                'categoriesUk' => ArticleCategoryUk::getArticleCategoriesUkByLang(),

            ]);
        }

    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUk = ArticleUk::getArticleUkByLangAndArticleId($model->id);


        if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $modelUk])) {


            $model->save(false);
            $modelUk->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUk' => $modelUk,
                'categories' => ArticleCategory::find()->active()->all(),
                'categoriesUk' => ArticleCategoryUk::getArticleCategoriesUkByLang(),
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelI18 = $model->articleI18;
        $modelI18->delete();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
