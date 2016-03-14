<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>


    <h4>English original</h4>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'body')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight'=>400,
                'maxHeight'=>400,
                'buttonSource'=>true,
                'imageUpload'=>Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php echo $formEng->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $formEng->field($model, 'status')->checkbox() ?>

    <?php ActiveForm::end(); ?>


    <?php $formTr = ActiveForm::begin(); ?>

    <h4>Turkey Translation</h4>

    <? echo $formTr->field($modelI18, 'language_id')->hiddenInput(['value' => 'tr-TR']); ?>

    <?php echo $formTr->field($modelI18, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $formTr->field($modelI18, 'body')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight'=>400,
                'maxHeight'=>400,
                'buttonSource'=>true,
                'imageUpload'=>Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton($modelI18->isNewRecord ? Yii::t('backend', 'CreateI18') : Yii::t('backend', 'UpdateI18'), ['class' => $modelI18->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php echo $formTr->field($modelI18, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $formTr->field($modelI18, 'status')->checkbox() ?>

    <?php ActiveForm::end(); ?>

    <?php $formUk = ActiveForm::begin(); ?>
    <h4>Переклад Українською</h4>

    <? echo $formUk->field($modelI18, 'language_id')->hiddenInput(['value' => 'uk-UA']); ?>

    <?php echo $formUk->field($modelI18, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $formUk->field($modelI18, 'body')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight'=>400,
                'maxHeight'=>400,
                'buttonSource'=>true,
                'imageUpload'=>Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton($modelI18->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $modelI18->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php echo $formUk->field($modelI18, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $formUk->field($modelI18, 'status')->checkbox() ?>



    <?php ActiveForm::end(); ?>

</div>
