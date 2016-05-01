<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PartnerSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="partners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'short_name') ?>

    <?php echo $form->field($model, 'full_name') ?>

    <?php echo $form->field($model, 'reg_code') ?>

    <?php echo $form->field($model, 'prop_form') ?>

    <?php // echo $form->field($model, 'isVAT') ?>

    <?php // echo $form->field($model, 'VAT_code') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
