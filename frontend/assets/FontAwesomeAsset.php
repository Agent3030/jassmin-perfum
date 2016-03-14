<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 27.02.16
 * Time: 16:05
 */
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace frontend\assets;
use yii\web\AssetBundle;

/**
 * This asset bundle provides the [jquery javascript library](http://jquery.com/)
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@bower/font-awesome/css';
    public $css = [
        'font-awesome.css',
    ];
}