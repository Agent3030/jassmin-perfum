<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php')
?>
    <section>
        <div class="container-fluid">
            <div class="col-md-2">
                <div class="row">
                    <div class="flags">
                        <div class="col-md-4">
                            <div class="turk-flag">
                                <?=Html::a(Html::img('@web/img/turkey.png', ['alt' => 'Turkey', 'class' => 'img-responsive']),['/site/set-locale', 'locale'=>'tr-TR']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="gb-flag">
                                <?= Html::a(Html::img('@web/img/britain.png', ['alt' => 'Britain', 'class' => 'img-responsive']),['/site/set-locale', 'locale'=>'en-US']) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ukr-flag">
                                <?= Html::a(Html::img('@web/img/ukraine.png', ['alt' => 'ukraine', 'class' => 'img-responsive']),['/site/set-locale', 'locale'=>'uk-UA']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(Yii::$app->user->isGuest):?>
                    <div class="col-md-12 auth-form">
                        <div class="login">


                            <?= app\components\widgets\Login::widget(['model' => frontend\modules\user\models\LoginForm::className()]) ?>
                            <?= Yii::$app->language?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="search">
                            <div class="form-group search-group">
                                <input type="text" placeholder="your aroma" class="form-control search-control">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="img-cont-logo">
                            <?= Html::img('@web/img/jassmine_logo.png', ['alt' => 'Jassmine Logo', 'class' => 'img-responsive']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="img-cont-crem">
                            <?= Html::img('@web/img/crem3.png', ['alt' => 'Crem 3', 'class' => 'img-responsive']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                        <div class="img-cont-best">
                            <?= Html::img('@web/img/best_seller.png', ['alt' => 'Best seller', 'class' => 'img-responsive']) ?>
                        </div>
                    </div>
                </div>
             </div>



                <?php echo $content ?>


        </div>
    </section>


<?php $this->endContent() ?>