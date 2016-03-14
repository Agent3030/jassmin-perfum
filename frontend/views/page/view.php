<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */

$this->title = !isset($modelI18) ? $model->title : $modelI18->title;
?>
<div class = "col-md-10">
<div class="content">
    <?php if (!isset($modelI18)):?>
    <h1><?php echo $model->title ?></h1>
    <p><?php echo $model->body ?></p>

    <?php else:?>
    <h1><?php echo $modelI18->title ?></h1>
    <p><?php echo $modelI18->body ?></p>

    <?php endif; ?>
</div>
</div>