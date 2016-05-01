<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><?=Html::encode('Введите бренд')?></h4>
</div>

<div class="modal-body">
     <div class = "col-md-6">
<?php
    $form = ActiveForm::begin([
        'id' =>'brand-create'

    ]); ?>

        <?= $form->field($model, 'brand_name')->textInput(['maxlength' => true]) ?>


    </div>
</div>
<div class ="modal-footer">
    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php $js = <<<JS
    jQuery('#brand-create').on('beforeSubmit', function(){
var form = jQuery(this);
jQuery.post(
form.attr("action"),
form.serialize()
)
.done(function(result) {
form.parent().replaceWith(result);
})
.fail(function() {
console.log("server error");
});
return false;
})

JQuery.post( "/brand/create-modal", function( data ) {
  JQuery( ".result" ).html( data );
});


JS;
$this->registerJs($js);
?>