<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prices */

$this->title = 'Update Prices: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prices-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
