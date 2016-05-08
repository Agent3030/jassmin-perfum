<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\modules\shop\assets;

use yii\web\AssetBundle;
use frontend\assets\FontAwesomeAsset;
use frontend\assets\ParallaxJsAsset;
use frontend\assets\ScrollToAsset;


/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ShopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/shop.css',
    ];

    public $js = [
        'js/scripts.js',
        'js/shop.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        '\frontend\assets\ScrollToAsset',


    ];
}
