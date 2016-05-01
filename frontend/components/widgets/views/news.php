<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 01.04.16
 * Time: 23:08
 */

 echo \yii\widgets\ListView::widget([
    'dataProvider'=>$dataProvider,
    'pager'=>[
        'hideOnSinglePage'=>true,
    ],
     'summary' => false,
    'itemView'=>'_news'
])?>