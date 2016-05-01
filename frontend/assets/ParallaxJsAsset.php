<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 29.03.16
 * Time: 23:11
 */
namespace frontend\assets;
use yii\web\AssetBundle;

class ParallaxJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/parallax.js';
    public $js = [
        'parallax.min.js',
    ];
}