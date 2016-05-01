<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 29.03.16
 * Time: 23:14
 */

namespace frontend\assets;
use yii\web\AssetBundle;

class ScrollToAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery.scrollTo';
    public $js = [
        'jquery.scrollTo.min.js',
    ];
}