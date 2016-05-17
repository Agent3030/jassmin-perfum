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

    <?php //print_r($modelUk) ?>


    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($modelUk, 'short_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class = "col-md-6">
            <?php echo $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($modelUk, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($modelUk, 'prop_form')->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($model, 'prop_form')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class = "hidden">
        <?php echo $form->field($model, 'language_id')->hiddenInput(['value' => 3]); ?>
    </div>

    <div class = "row">
        <div class = "col-md-6">
            <?php echo $form->field($model, 'reg_code')->textInput() ?>
        </div>
    </div>

    <div class = "row">
        <div class="col-md-3">
            <?php echo $form->field($model, 'isVAT')->checkbox();?>
        </div>
        <div class = "col-md-6">
            <?php echo $form->field($model, 'VAT_code')->textInput(['value'=> '0']) ?>
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






<div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
</div>


<?php $js = <<<JS
   // jQuery("input[type='radio']:checked").val() === "0" ? jQuery('#partners-vat_code').hide() : ;
    //console.log(jQuery("#partners-isvat").val());
    jQuery('.checkbox').on('change', ':checkbox', function() {
       var checkState = $(this)
       if(checkState.is(':checked')) {

        jQuery('.field-partners-vat_code').show()

       } else {
            jQuery('#partners-vat_code').val(0);
            jQuery('.field-partners-vat_code').hide();
       }

    });


JS;
$this->registerJs($js);
?>
