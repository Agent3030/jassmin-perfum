<?php
namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;
use common\models\Offices;
use common\models\OfficesI18;
use frontend\models\search\OfficesSearch;
use frontend\models\search\OfficesI18Search;
use frontend\components\GoogleMaps\GoogleMaps;
use common\models\Languages;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');

    }

    public function actionContacts()
    {
        $this->layout = 'contact';
        $markAddr = [];
        $lang = Languages::getLanguageByCode(Yii::$app->language);


        if ($lang->status == true) {
            $searchModel = new OfficesSearch();
            $dataProvider = $searchModel->search(['OfficesSearch' => Yii::$app->request->queryParams]);
            $models = $dataProvider -> models;

            foreach ($models as $model) {

                $markAddr[] = $model -> city;
                $markAddr[] = $model -> street;
                $markAddr[] = $model -> house;
                $marker = implode(' ', $markAddr);


                GoogleMaps::setMarker($marker, $model->status);

                $markAddr = [];
            }


            $dataProvider  = $searchModel->search(['OfficesSearch'=>['status'=> 'Head Office']]);
            $headOffice = $dataProvider -> models;
            GoogleMaps::setLntLng($headOffice[0]->city);

            $dataProvider = $searchModel -> search(['OfficesSearch'=>['status'=> 'stock']]);
            $stocks = $dataProvider-> models;


            $dataProvider = $searchModel -> search(['OfficesSearch'=>['status'=> 'branch']]);
            $branches = $dataProvider-> models;






        } else {
            $searchModel = new OfficesI18Search();

            $dataProvider = $searchModel->search(['OfficesSearch' => Yii::$app->request->queryParams]);
            $models = $dataProvider -> models;

             foreach ($models as $model) {
                 $markAddr[] = $model->city;
                 $markAddr[] = $model->street;
                 $markAddr[] = $model->offices->house;
                 $marker = implode(' ', $markAddr);

                 GoogleMaps::setMarker($marker, $model->status);
                 $markAddr = [];
             }


            $dataProvider  = $searchModel->search(['OfficesI18Search'=>['status'=> 'Головний офіс']]);
            $headOffice = $dataProvider -> models;
            GoogleMaps::setLntLng($headOffice[0]->city);

            $dataProvider  = $searchModel->search(['OfficesI18Search'=>['status'=> 'склад']]);
            $stocks = $dataProvider->models;




            $dataProvider  = $searchModel->search(['OfficesI18Search'=>['status'=> 'філія']]);
            $branches = $dataProvider->models;
        }
        $latLng = GoogleMaps::getLntLng();
        $markers = GoogleMaps::getMarker();



        return $this->render('contact', ['headOffice'=>$headOffice,
                                        'stocks' => $stocks,
                                        'branches' => $branches ,
                                        'latLng' => $latLng,
                                        'markers'=> $markers,
                                        'zoom' => 10
                                    ]);




    }
}
