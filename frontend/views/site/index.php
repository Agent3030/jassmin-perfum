<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\DbCarousel;
$this->title = Yii::$app->name;
?>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="img-cont-center">
                <?php /*Html::img('@web"carousel-indicators"/img/main_pic.jpg', ['alt' => 'Main Image','class' => 'img-responsive']) */?>
                <?php echo \common\widgets\DbCarousel::widget(['key' => 'main', 'showIndicators' => false,
                'options' => ['data-interval'=> 3000]]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-2">
            <div class="img-cont-perfume1">
                <?= Html::img('@web/img/perfume1.png', ['alt' => 'Perfume 1','class' => 'img-responsive']) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="shop-button">
                <?= Html::img('@web/img/shop_online_icon.png', ['alt' => 'Shop Button','class' => 'img-responsive']) ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="img-cont-perfume2">
                <?= Html::img('@web/img/perfume2.png', ['alt' => 'Perfume 2','class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <div class="img-cont-map">
                <?= Html::img('@web/img/address.png', ['alt' => 'Map','class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="row">
        <div class="col-md-12">
            <div class="img-cont-bestgirl">
                <?= Html::img('@web/img/bestgirl.png', ['alt' => 'Best girl', 'class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="img-cont-news">
                <?= Html::img('@web/img/news.png', ['alt' => 'news', 'class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="img-cont-foto">
                <?= Html::img('@web/img/foto.png', ['alt' => 'foto', 'class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="img-cont-foto">
                <?= Html::img('@web/img/foto.png', ['alt' => 'foto', 'class' => 'img-responsive']) ?>
            </div>
        </div>
    </div>
</div>
