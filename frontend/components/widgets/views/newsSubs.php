<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 02.04.16
 * Time: 20:24
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$form = ActiveForm::begin([
    'action'=>Url::toRoute(['/user/subscribe']),

    //'errorSummaryCssClass' =>'error-summary',
]);?>
<div class="col-md-6">
    <div class="form-group news-signup-group">
        <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'form-control news-signup-control', 'placeholder' =>'Enter Your Email'])->label(false); ?>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group news-signup-group">
        <?= Html::submitButton('subscribe', ['class'=>'form-control', 'class'=>'form-control news-btn']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

