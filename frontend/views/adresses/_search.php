<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\AdressesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adresses-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'partner_id') ?>

    <?= $form->field($model, 'region') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house') ?>

    <?php // echo $form->field($model, 'appartment') ?>

    <?php // echo $form->field($model, 'index') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
