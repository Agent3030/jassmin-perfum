<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adresses */

$this->title = 'Create Adresses';
$this->params['breadcrumbs'][] = ['label' => 'Adresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adresses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
