<?php

namespace backend\controllers;

use common\models\PartnersI18;
use Yii;
use common\models\Partners;
use common\models\Adresses;
use common\models\AdressesI18;
use backend\models\search\PartnerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * PartnerController implements the CRUD actions for Partners model.
 */
class PartnerController extends Controller
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
     * Lists all Partners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PartnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Partners model.
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
     * Creates a new Partners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Partners();
        $modelUk = new PartnersI18();
        $adresses = new Adresses();
        $adressesUk = new AdressesI18();


        if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post()) &&
            $adresses->load(Yii::$app->request->post()) && $adressesUk->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $modelUk, $adresses, $adressesUk])) {

            $model->save(false);
            $modelUk->partner_id = $model->id;
            $modelUk->save(false);
            $adresses->partner_id = $model->id;
            $adresses->status = 1;
            $adresses->save(false);
            $adressesUk->adress_id = $adresses->id;
            $adressesUk->partnersI18 = $modelUk->id;
            $adressesUk->save(false);


            return $this->redirect(['index']);
        } else {
            $model->isVAT = true;
            return $this->render('create', [
                'model' => $model,
                'modelUk' => $modelUk,
                'adresses' => $adresses,
                'adressesUk' => $adressesUk
            ]);
        }


    }



    /**
     * Updates an existing Partners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUk = $model->partnersI18;
        $adresses = $model->adresses;
        $adressesUk = $adresses->adressesI18;
        print_r($adresses);

        if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post()) &&
            $adresses->load(Yii::$app->request->post()) && $adressesUk->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $modelUk, $adresses, $adressesUk])) {

            $model->save(false);
            $modelUk->save(false);
            $adresses->save(false);
            $adressesUk->save(false);


            return $this->redirect(['index']);
        } else {
            $model->isVAT = true;
            return $this->render('create', [
                'model' => $model,
                'modelUk' => $modelUk,
                'adresses' => $adresses,
                'adressesUk' => $adressesUk
            ]);
        }
    }

    /**
     * Deletes an existing Partners model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelI18 = $model->partnersI18;
        $modelI18->delete();
        $model->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Partners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Partners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Partners::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
