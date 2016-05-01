<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories array */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3>Category</h3>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => 1024]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

    <?php echo $form->field($model, 'parent_id')->dropDownList($categories, ['prompt'=>'']) ?>


    <h3>Категорії</h3>

    <?php echo $form->field($modelUk, 'language_id')->hiddenInput(['value' => 3]); ?>

    <?php echo $form->field($modelUk, 'title')->textInput(['maxlength' => 512]) ?>

    <?php echo $form->field($modelUk, 'parent_id')->hiddenInput(['value' => $categories->parent_id]);?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
