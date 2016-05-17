<?php


use yii\helpers\ArrayHelper;


?>
<?php
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $roles yii\rbac\Role[] */
$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'User',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php echo $this->render('_form', [
        'model'=>$model,
        'partners' => $partners,
        'partnersI18' => $partnersI18,
        'profile' => $profile,
        'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
    ]) ?>

</div>
