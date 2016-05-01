<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Articles')
?>


<div class="col-md-12">
    <div class="article-content-main">
        <h1><?php echo Yii::t('frontend', 'news') ?></h1>
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'pager'=>[
                'hideOnSinglePage'=>true,
            ],
            'itemView'=>'_item'
        ])?>
    </div>
</div>