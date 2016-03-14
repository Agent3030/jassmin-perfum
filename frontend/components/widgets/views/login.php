<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FA;
                                   
        $form = ActiveForm::begin([
        'id' => 'login-form',
        'action'=>Url::toRoute(['/user/sign-in/login']),
        'fieldConfig' => [
            'template' => "{input}",
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
        //'errorSummaryCssClass' =>'error-summary',                              
    ]);?>

                                       
                                     <?= $form->field($model, 'identity') ?>
                                   
                                          
                                   
                                     <?= $form->field($model, 'password')->passwordInput() ?>

<?= Html::submitButton(FA::icon('arrow-right')->size(FA::SIZE_2X), ['class'=>'form-button','name' => 'login-button', 'id'=>'login-btn']) ?>






<?php echo $form->errorSummary($model); ?>
                     
  
               <?php ActiveForm::end(); ?>

