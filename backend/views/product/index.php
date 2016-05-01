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
            'gender',
            [
             'attribute' => 'brand_id',
             'value'  => function($model) {
                 return $model->brand ? $model->brand->brand_name : null;
             }
            ],
            'product_name',
            [
            'attribute' => 'description',
            'format' => 'html'
            ],
            [
             'attribute' => 'bulk_id',
             'value' => function($model) {
                 return $model->bulk ? $model->bulk->bulk : null;
             }
            ],
            [
                'attribute' => 'author_id',
                'value' => function($model) {
                    return $model->author ? $model->author->username : null;
                }
            ],
            'created_at:datetime',
            // 'updated_at',
            // 'status',
            // 'is_available',
            // 'is_new',
            // 'is_action',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>



</div>
