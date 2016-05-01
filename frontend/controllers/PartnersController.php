<?php

namespace frontend\controllers;

use common\models\Partners;
use common\models\Adresses;
use common\models\AdressesI18;
use common\models\Languages;
use frontend\components\GoogleMaps\GoogleMaps;
use frontend\models\search;
use yii\data\ActiveDataProvider;

use Yii;

class PartnersController extends \yii\web\Controller
{
    public $layout = "partners";

    public function actionIndex()
    {
        $markAddr = [];
        $lang = Languages::getLanguageByCode(Yii::$app->language);
        GoogleMaps::setLntLng('Ukraine');



        if ($lang->status == true) {
            $searchModel = new search\AdressesSearch();
            $dataProvider = $searchModel->search([Yii::$app->request->queryParams]);
            $models = $dataProvider->models;

            foreach ($models as $model) {

                $markAddr[] = $model -> city;
                $markAddr[] = $model -> street;
                $markAddr[] = $model -> house;
                $marker = implode(' ', $markAddr);
                $name = $model->partners->short_name;

                GoogleMaps::setMarker($marker,$name);

                $markAddr = [];
            }


        } else {
            $searchModel = new search\AdressesI18Search();
            $dataProvider = $searchModel->search([Yii::$app->request->queryParams]);
            $models = $dataProvider->models;
            //print_r($models);



            foreach ($models as $model) {

                $markAddr[] = $model -> city;
                $markAddr[] = $model -> street;
                $markAddr[] = $model->adresses-> house;
                $marker = implode(' ', $markAddr);
                $name = $model->partnersI18->short_name;

                GoogleMaps::setMarker($marker,$name);

                $markAddr = [];
            }

        }



        return $this->render('index', ['dataProvider'=>$dataProvider, 'lntlng'=>GoogleMaps::getLntLng(),'markers'=>GoogleMaps::getMarker(),'zoom' => 6]);

    }

    public function actionSearchRegion()
    {
        $markAddr = [];
        $lang = Languages::getLanguageByCode(Yii::$app->language);
        GoogleMaps::setLntLng(Yii::$app->request->queryParams['city']);



            if ($lang->status == true) {
                $searchModel = new search\AdressesSearch();
                $dataProvider = $searchModel->search(['AdressesSearch' => Yii::$app->request->queryParams]);
                $models = $dataProvider->models;
                //print_r($models);



                foreach ($models as $model) {

                    $markAddr[] = $model -> city;
                    $markAddr[] = $model -> street;
                    $markAddr[] = $model -> house;
                    $marker = implode(' ', $markAddr);
                    $name = $model->partners->short_name;

                    GoogleMaps::setMarker($marker,$name);

                    $markAddr = [];
                }


            } else {
                $searchModel = new search\AdressesI18Search();
                $dataProvider = $searchModel->search(['AdressesI18Search' => Yii::$app->request->queryParams]);
                $models = $dataProvider->models;


                foreach ($models as $model) {

                    $markAddr[] = $model->city;
                    $markAddr[] = $model->street;
                    $markAddr[] = $model->adresses->house;
                    $marker = implode(' ', $markAddr);
                    $name = $model->partnersI18->short_name;

                    GoogleMaps::setMarker($marker, $name);

                    $markAddr = [];
                }
            }



            return $this->render('index', ['dataProvider'=>$dataProvider, 'lntlng'=>GoogleMaps::getLntLng(),'markers'=>GoogleMaps::getMarker(),'zoom' => 9]);


}

}
