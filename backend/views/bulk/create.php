<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bulks */

$this->title = 'Create Bulks';
$this->params['breadcrumbs'][] = ['label' => 'Bulks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bulks-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
