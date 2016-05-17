<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Create Partners';
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'modelUk' => $modelUk,
        'adresses' => $adresses,
        'adressesUk' => $adressesUk
    ]) ?>

</div>
