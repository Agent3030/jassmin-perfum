<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use frontend\assets\FontAwesomeAsset;
use frontend\assets\ParallaxJsAsset;
use frontend\assets\ScrollToAsset;


/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/styles.css',
    ];

    public $js = [
        'js/scripts.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        '\frontend\assets\ParallaxJsAsset',
        '\frontend\assets\ScrollToAsset',


    ];
}
