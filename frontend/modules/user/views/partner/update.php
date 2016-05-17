<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Partners',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="partners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUk' => $modelUk
    ]) ?>

</div>
