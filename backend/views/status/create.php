<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Statuses */

$this->title = 'Create Statuses';
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statuses-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelUk'=> $modelI18
    ]) ?>

</div>
