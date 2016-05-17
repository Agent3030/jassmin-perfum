<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Statuses */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="statuses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'status_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->errorSummary($modelUk); ?>

    <?php echo $form->field($modelUk, 'lang_id')->hiddenInput(['value' => 3]); ?>

    <?php echo $form->field($modelUk, 'status_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
