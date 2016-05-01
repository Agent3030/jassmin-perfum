<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = Yii::$app->name;
?>


<section class="news">
    <div class="container">
        <div class="news-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-3">
                        <h1 class="news-head">news</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group news-signup-group">
                            <input type="text" name="news" placeholder="Enter your email" class="form-control news-signup-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group news-signup-group">
                            <input type="submit" value="Subscribe" class="form-control news-btn">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id = "news-id">
                <?php Pjax::begin(['id' => 'news-id', 'enablePushState' => false, 'timeout' => 10000]);?>
                <?php echo \app\components\widgets\News::widget(['currentLang'=> Yii::$app->language, 'limit' => 6]);?>
                <?php  Pjax::end();?>
            </div>

            </div>
    </div>
    <div id="to-about-up" class="arrow-up">
        <p> <i class="fa fa-arrow-circle-up fa-2x"></i></p>
    </div>
    <div id="to-products" class="arrow-down">
        <p> <i class="fa fa-arrow-circle-down fa-2x"></i></p>
    </div>
</section>
