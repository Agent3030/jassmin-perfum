<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'product_code',
            [
             'attribute' => 'brand_id',
             'value'  => function($model) {
                 return $model->brand ? $model->brand->brand_name : null;
             }
            ],
            'product_name',
            [
             'attribute' => 'bulk_id',
             'value' => function($model) {
                 return $model->bulk ? $model->bulk->bulk : null;
             }
            ],
            [
                'attribute' => 'price',
                'value' => function($model) {
                    $status = Yii::$app->user->identity->userProfile;
                    print_r($status);
                    //return $status;
                }
            ],
            [
                'label'=>'add_prices',
                'format' => 'html',
                'value'=>function ($model) {
                    return Html::a('Установить цену', ['/prices/create', 'id' => $model->id]);
                },
            ],
            [
                'attribute' => 'author_id',
                'value' => function($model) {
                    return $model->author ? $model->author->username : null;
                }
            ],
            'created_at:datetime',


            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>



</div>
