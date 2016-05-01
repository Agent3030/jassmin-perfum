<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 14.04.16
 * Time: 21:46
 */
namespace frontend\assets;;

use yii\web\AssetBundle;


class NewsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        '/js/news.js',
    ];


}