<?php

namespace frontend\modules\user\controllers;

use common\models\Adresses;
use common\models\AdressesI18;
use Yii;
use common\models\Partners;
use common\models\PartnersI18;
use frontend\modules\user\models\search\PartnerSearch;
use yii\web\Controller;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PartnerController implements the CRUD actions for Partners model.
 */
class PartnerController extends Controller
{
    public $layout = "cabinet";
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

        $flashMessages = Yii::$app->session->getFlash('partner-confirm');


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'flash' => $flashMessages
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

        if( !Yii::$app->user->identity->userProfile->partner) {
            $model = new Partners();
            $modelUk = new PartnersI18();
            $adresses = new Adresses();
            $adressesUk = new AdressesI18();
            $userProfile = Yii::$app->user->identity->userProfile;
            $status = \common\models\Statuses::find()->where(['status_name' => 'Reseller'])->one();

            if ($model->load(Yii::$app->request->post()) && $modelUk->load(Yii::$app->request->post()) &&
                $adresses->load(Yii::$app->request->post()) && $adressesUk->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $modelUk, $adresses, $adressesUk])) {

                $userProfile->partner_id = $model->id;
                $userProfile->save(false);
                $model->status_id = $status->id;
                $model->user_id = Yii::$app->user->identity->id;
                $model->save(false);
                $modelUk->partner_id = $model->id;
                $modelUk->save(false);
                $adresses->partner_id = $model->id;
                $adresses->save(false);
                $adressesUk->adress_id = $adresses->id;
                $adressesUk->partnerI18_id = $modelUk->id;
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
        return $this -> redirect(['/user/partner/update', 'id' => Yii::$app->user->identity->userProfile->partner->id]);
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
        $adresses = $model -> adresses;
        $adressesUk = $modelUk -> adressesI18;

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
                'modelUk'=> $modelUk,
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
        $this->findModel($id)->delete();

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

    /**
     * Confirm that user belong to partner company by input of partner registration code
     * @param integer $id
     * @return mixed
     */
    public function actionConfirm($id) {

        $model = $this-> findModel($id);
        $regCode = $model->reg_code;

        $user_id = Yii::$app->user->identity->id;
        $userProfile =  Yii::$app->user->identity->userProfile;

        $post = Yii::$app->request->post();

        $confirmRegCode = $post['Partners']['reg_code'];

        if ($confirmRegCode == $regCode) {

            $model -> user_id = $user_id;

            $userProfile->partner_id = $model->id;

            $userProfile->save(false);
            $model->save(false);

            Yii::$app->getSession()->setFlash('partner-confirm', [
                'body' => Yii::t('frontend', 'Your company has been successfully confirmed'),
                'options' => ['class'=>'alert-success']
            ]);
            return $this->redirect('index');
        }

        return $this->render('confirm', [
            'model' => $model,
        ]);

    }
    /**
     * Add user id to partner
     * @param integer $id
     *
     */



}
