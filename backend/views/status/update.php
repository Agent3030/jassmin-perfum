<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Statuses */

$this->title = 'Update Statuses: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statuses-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelUk' =>$modelI18
    ]) ?>

</div>
