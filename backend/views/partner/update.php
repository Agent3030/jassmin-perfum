<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Update Partners: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partners-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelUk' => $modelUk,
        'adresses' => $adresses,
        'adressesUk' => $adressesUk
    ]) ?>

</div>
