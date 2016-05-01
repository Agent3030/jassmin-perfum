<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Brands */

$this->title = 'Update Brands: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brands-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
