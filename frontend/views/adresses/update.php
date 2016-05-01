<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adresses */

$this->title = 'Update Adresses: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adresses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
