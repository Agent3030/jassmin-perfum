<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="partners-form">
    <?php $form = ActiveForm::begin(); ?>



    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($modelUk, 'short_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($modelUk, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($model, 'prop_form')->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($modelUk, 'prop_form')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class = "hidden">
    <?php echo $form->field($modelUk, 'language_id')->hiddenInput(['value' => 3]); ?>
    </div>





    <div class = "row">
        <div class = "col-md-6">
    <?php echo $form->field($model, 'reg_code')->textInput() ?>
        </div>
    </div>

    <div class = "row">
        <div class="col-md-3">
    <?php echo $form->field($model, 'isVAT')->radioList(['0'=>'without VAT','1' => 'with VAT']);?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($model, 'VAT_code', ['options' => ['value'=> '0']])->textInput() ?>
        </div>
    </div>

    <div class = "row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'status_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                common\models\Statuses::find()->all(),
                'id',
                'brand_name'
            ), ['prompt'=>'Select Status']) ?>

        </div>
        <div class="col-md-6">


            <div class="form-group">
                <?= Html::a('Create', ['/status/create'], ['class' => 'btn btn-success']) ?>
            </div>


        </div>
    </div>


    <div class="row">
        <div class = "col-md-12">
            <?php echo $form->field($model, 'partner_attachements')->widget(
                Upload::className(),
                [
                    'url' => ['/file-storage/upload'],
                    'sortable' => true,
                    'maxFileSize' => 20000000, // 20 MiB
                    'maxNumberOfFiles' => 20,
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(pdf|jpe?g|png)$/i'),
                ]);
            ?>
        </div>

    </div>



    </div>
</div>





    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $js = <<<JS
    jQuery("input[type='radio']:checked").val() === "0" ? jQuery('.field-partners-vat_code').hide() : jQuery('.field-partners-vat_code').show();
    var a = $('.radio label input[name = "Partners[isVAT]"]:checked').val();
    console.log(a);


JS;
$this->registerJs($js);
?>
