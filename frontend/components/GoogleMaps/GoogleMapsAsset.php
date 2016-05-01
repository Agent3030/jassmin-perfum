<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\GoogleMaps;

use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 09.04.16
 * Time: 22:03
 */

class GoogleMapsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        '/js/map.js',
    ];


}