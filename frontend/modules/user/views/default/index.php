<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('frontend', 'User Settings')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2><?php echo Yii::t('frontend', 'Profile settings') ?></h2>

    <?php echo $form->field($profile, 'picture')->widget(
        Upload::classname(),
        [
            'url' => ['avatar-upload']
        ]
    )?>

    <?php echo $form->field($profile, 'firstname')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($profile, 'middlename')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($profile, 'lastname')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($profile, 'position')->textInput(['maxlength' => 255]) ?>


    <?php echo $form->field($profile, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>

    <?php echo $form->field($profile, 'gender')->dropDownlist([
        \common\models\UserProfile::GENDER_FEMALE => Yii::t('frontend', 'Female'),
        \common\models\UserProfile::GENDER_MALE => Yii::t('frontend', 'Male')
    ], ['prompt' => '']) ?>

    <h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

    <?php echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'email') ?>

    <?php echo $form->field($model, 'password')->passwordInput() ?>

    <?php echo $form->field($model, 'password_confirm')->passwordInput() ?>

    <?php /*echo $form->field($model->getModel('profile'), 'partner_id')->dropDownList(\yii\helpers\ArrayHelper::map(
        common\models\Partners::find()->all(),
        'id',
        'short_name'
    ), ['prompt'=>'Select Your Company']) */?>




    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
