<?php

use yii\helpers\Html;
use yii\helpers\Url;
use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">
    <div class = "row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'create-product-form'
            ]); ?>

            <?= $form->field($model, 'gender')->dropDownList([
                'Man' => 'Man',
                'woman' => 'Woman'
            ]) ?>

            <div class="row">
                <div class = "col-md-6">
                    <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class = "col-md-6">
                    <?php echo $form->field($model, 'brand_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                        common\models\Brands::find()->all(),
                        'id',
                        'brand_name'
                    ), ['prompt'=>'Select Brand']) ?>


                </div>
                <div class="col-md-6">


                        <div class="form-group">
                            <?= Html::a('Create Brand', ['/brand/create'], ['class' => 'btn btn-success']) ?>
                        </div>


                </div>
            </div>

            <div class = "row">
                <div class="col-md-6">
                    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
            <div class = "row">
                <div class = "col-md-12">
                    <?= $form->field($model, 'description')->widget(
                        \yii\imperavi\Widget::className(),
                        [
                            'plugins' => ['fullscreen', 'fontcolor', 'video'],
                            'options' => [
                                'minHeight' => 200,
                                'maxHeight' => 400,
                                'buttonSource' => true,
                                'convertDivs' => false,
                                'removeEmptyTags' => false,
                                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
                            ]
                        ]
                    ) ?>
                </div>
            </div>

            <div class = "row">
                <div class="col-md-6">
                    <?php echo $form->field($model, 'bulk_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                        common\models\Bulks::find()->all(),
                        'id',
                        'bulk'
                    ), ['prompt'=>'Select Bulk']) ?>

                </div>
                <div class="col-md-6">
                    <div class="form-group button-block">

                        <?= Html::a('Create Bulk', ['/bulk/create'], ['class' => 'btn btn-success']) ?>

                    </div>

                </div>
            </div>
            <div class = "row">
                <div class = "col-md-3">
                    <?= $form->field($model, 'status')->checkbox(); ?>
                </div>
                <div class = "col-md-3">
                    <?= $form->field($model, 'is_available')->checkbox(['value' =>true]); ?>
                </div>
                <div class = "col-md-3">
                    <?= $form->field($model, 'is_new')->checkbox(); ?>
                </div>
                <div class = "col-md-3">
                    <?= $form->field($model, 'is_action')->checkbox(); ?>
                </div>
            </div>
            <div class="row">
                <div class = "col-md-12">
                    <?php echo $form->field($model, 'product_images')->widget(
                        Upload::className(),
                        [
                            'url' => ['/file-storage/upload'],
                            'sortable' => true,
                            'maxFileSize' => 5000000, // 10 MiB
                            'maxNumberOfFiles' => 10,
                            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        ]);
                    ?>
                </div>

            </div>




      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

        </div>

    </div>
   </div>

</div>
