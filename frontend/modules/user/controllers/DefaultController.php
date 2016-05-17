<?php

namespace frontend\modules\user\controllers;

use common\base\MultiModel;
use frontend\modules\user\models\AccountForm;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\base\Model;
use common\models\Partners;
use common\models\PartnersI18;

class DefaultController extends Controller
{
    public $layout = "cabinet";
    /**
     * @return array
     */
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

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $model = new AccountForm();
        $model->setUser(Yii::$app->user->identity);
        $profile = Yii::$app->user->identity->userProfile;
        //$partners = new Partners();
        //$partnersI18 = new PartnersI18();

       /* $model = new MultiModel([
            'models' => [
                'account' => $accountModel,
                'partners' => $partners,
                'partnersI18' => $partnersI18,
                'profile' => Yii::$app->user->identity->userProfile
            ]
        ]);*/

        if  ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())&& Model::validateMultiple([$model,$profile])) {
            $model->save(false);

            $profile->locale = Yii::$app->language;
            $profile->save(false);

            Yii::$app->session->setFlash('alert', [
                'options' => ['class'=>'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved')
            ]);
            return $this->goHome();
        }
        return $this->render('index', ['model'=>$model,
                                       'profile' => $profile
                                                ]);
    }
}
