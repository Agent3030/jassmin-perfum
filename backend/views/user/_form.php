<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">
    <?php print_r($model); ?>
    <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($model->getModel('user'), 'username') ?>
        <?php echo $form->field($model->getModel('profile'), 'firstname') ?>
        <?php echo $form->field($model->getModel('user'), 'email') ?>
        <?php echo $form->field($model->getModel('user'), 'password')->passwordInput() ?>
        <?php echo $form->field($model->getModel('user'), 'status')->dropDownList(User::statuses()) ?>
        <?php echo $form->field($model->getModel('profile'), 'partner_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                $model->getModel('partners'),
                'id',
                'short_name'
            ), ['prompt'=>'Enter Your Company']) ?>
        <?php echo $form->field($model->getModel('user'), 'roles')->checkboxList($roles) ?>
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
