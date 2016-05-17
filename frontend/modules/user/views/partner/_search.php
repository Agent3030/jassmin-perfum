<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\user\models\search\PartnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php// $form->field($model, 'id') ?>

    <?= $form->field($model, 'short_name') ?>

    <?php// $form->field($model, 'full_name') ?>

    <?= $form->field($model, 'reg_code') ?>

    <?php// $form->field($model, 'prop_form') ?>

    <?php // echo $form->field($model, 'isVAT') ?>

    <?php // echo $form->field($model, 'VAT_code') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('frontend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
