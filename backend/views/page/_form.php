<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <p>Slug must be only in English</p>

    <h4>English original</h4>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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




    <h4>Turkey Translastion</h4>

    <?php echo $form->field($modelTr, 'language_id')->hiddenInput(['value' => 2]); ?>

    <?php echo $form->field($modelTr, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($modelTr, 'body')->widget(
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



    <h4>Переклад Українською</h4>

    <?php echo $form->field($modelUk, 'language_id')->hiddenInput(['value' => 3]); ?>

    <?php echo $form->field($modelUk, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($modelUk, 'body')->widget(
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



    <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php ActiveForm::end(); ?>

</div>
