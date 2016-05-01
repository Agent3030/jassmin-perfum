<?php

namespace backend\controllers;


use common\models\ArticleCategoryUk;
use Yii;
use yii\base\Model;
use common\models\ArticleCategory;
use backend\models\search\ArticleCategorySearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleCategoryController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoryController extends Controller
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
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArticleCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleCategory();
        $modelUk = new ArticleCategoryUk();
        $categories = ArticleCategory::find()->noParents()->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');
       if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post())&& Model::validateMultiple([$model,$modelUk])) {
           $model->save(false);


           $modelUk->article_category_id = $model->id;
           $modelUk->save(false);
           return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUk' => $modelUk,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Updates an existing ArticleCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUk = ArticleCategoryUk::getArticleCategoryUkByArticleCategoryId($model->id);
        $categories = ArticleCategory::find()->noParents()->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');
        if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $modelUk])) {


            $model->save(false);
             $modelUk->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelUk' => $modelUk,
                'categories' => $categories
            ]);
        }

    }

    /**
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelI18 = $model->articleCategoryI18;
        $modelI18->delete();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
