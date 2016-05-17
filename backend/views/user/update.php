<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;


?>

$this->title = Yii::t('backend', 'Update {modelClass}: ', ['modelClass' => 'User']) . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['view', 'id' => $model->email]];
$this->params['breadcrumbs'][] = ['label'=>Yii::t('backend', 'Update')];
?>
<div class="user-update">

    <?php echo $this->render('_form', [
        'model'=>$model,
        'partners' => $partners,
        'partnersI18' => $partnersI18,
        'profile' => $profile,
        'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
    ]) ?>

</div>
