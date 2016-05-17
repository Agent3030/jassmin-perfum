<?php

namespace backend\controllers;

use common\models\Partners;
use common\models\PartnersI18;
use common\models\UserToken;

use common\base\MultiModel;
use Yii;
use common\models\User;
use backend\models\UserEmailForm;
use backend\models\UserForm;
use backend\models\search\UserSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use yii\base\Model;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function actions()
    {
        return [
            'avatar-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new userForm();
        $profile = Yii::$app->user->identity->userProfile;

        $partners = new Partners();
        $partnersI18 = new PartnersI18();

        if  ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())&& Model::validateMultiple([$model,$profile])) {
            $model->save();

            $profile->locale = Yii::$app->language;
            $profile->save(false);

            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved')
            ]);
            return $this->goHome();
        }
        return $this->render('create', ['model'=>$model,
            'partners' => $partners,
            'partnersI18' => $partnersI18,
            'profile' => $profile,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }



    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));

        $profile = $model->getModel()->userProfile;

        $partners = new Partners();
        $partnersI18 = new PartnersI18();

        if  ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())&& Model::validateMultiple([$model,$profile])) {
            $model->save();

            $profile->locale = Yii::$app->language;
            $profile->save(false);

            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved')
            ]);
            return $this->goHome();
        }
        return $this->render('update', [
            'model'=>$model,
            'partners' => $partners,
            'partnersI18' => $partnersI18,
            'profile' => $profile,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }



    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->revokeAll($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
