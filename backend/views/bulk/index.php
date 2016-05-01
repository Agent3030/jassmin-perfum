<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BulksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bulks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bulks-index">

     <p>
        <?php echo Html::a('Create Bulks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bulk',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
