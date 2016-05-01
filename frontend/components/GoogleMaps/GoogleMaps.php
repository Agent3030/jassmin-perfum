<?php
namespace frontend\components\GoogleMaps;

use linslin\yii2\curl;
use Yii;

/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 06.04.16
 * Time: 23:16
 */

class GoogleMaps
{


    static public $center = [];
    static public $markerLntLng = [];
    static public $key;
    static protected $lang;
    const COUNTRY = 'UA';
    /*class constructor - default settings*/
    function __construct($point, $params)
        {
            self::$lang = (Yii::$app->language == 'en-US') ? 'en' : 'uk';
            $point = str_replace(' ', '+', $point);
            self::$key = Yii::$app->params['googleApiKey'];
            $this->zoom = $params['zoom'];
            $respParams = "address=$point&components=country:" . self::COUNTRY . "&language=$this->lang&key=$this->key";
            $curl = new curl\Curl();
            $response = $curl->get("https://maps.googleapis.com/maps/api/geocode/json?$respParams");

            $response = json_decode($response);
            $this->lntlng = $response->results[0]->geometry->location;

            $curl->reset();
        }

    /*get current coords*/
    public static function getLntLng()
    {
        return GoogleMaps::$center;
    }
    /*set coords*/
    public static function setLntLng($point)

    {
        self::$lang = (Yii::$app->language == 'en-US') ? 'en' : 'uk';
        $point = str_replace(' ', '+', $point);
        $respParams = "address=$point&components=country:" . self::COUNTRY . "&language=".self::$lang."&key=".self::$key."";
        $curl = new curl\Curl();
        $response = $curl->get("https://maps.googleapis.com/maps/api/geocode/json?$respParams");

        $response = json_decode($response);
        self::$center = $response->results[0]->geometry->location;


    }
    /*set marker coords*/
    public static function setMarker($point, $name)
    {
        self::$lang = (Yii::$app->language == 'en-US') ? 'en' : 'uk';
        $point = str_replace(' ', '+', $point);
        $respParams = "address=$point&components=country:" . self::COUNTRY . "&language=".self::$lang."&key=".self::$key."";
        $curl = new curl\Curl();
        $response = $curl->get("https://maps.googleapis.com/maps/api/geocode/json?$respParams");

        $response = json_decode($response);

        $marker = $response->results[0]->geometry->location;

        self::$markerLntLng[] = ['lntLng' =>$marker, 'name' => $name];
    }

    /*get marker coopds*/
    public static function getMarker()
    {
        return self::$markerLntLng;
    }

    public static function clearMarkers() {
        self::$markerLntLng = [];
    }




}