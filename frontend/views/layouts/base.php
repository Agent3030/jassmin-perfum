<?php

use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <header>
        <div class="head">
            <div class="container-fluid">
                <div class="col-md-offset-4 col-md-4">
                    <div class="main-logo">
                        <?= Html::img('@web/img/jassmine_logo.png', ['alt' => 'Jassmine Logo', 'class' => 'img-responsive']) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="social-head">
                        <li><a href="#"><?=FA::icon('facebook-square')->size(FA::SIZE_2X)?></a></li>
                        <li><a href="#"><?=FA::icon('instagram')->size(FA::SIZE_2X)?></a></li>
                        <li><a href="#"><?=FA::icon('vimeo-square')->size(FA::SIZE_2X)?></a></li>
                        <li><a href="#"><?=FA::icon('youtube-square')->size(FA::SIZE_2X)?></a></li>
                        <li><a href="#"><?=FA::icon('linkedin-square')->size(FA::SIZE_2X)?></a></li>
                        <li><a href="#"><?=FA::icon('tumblr-square')->size(FA::SIZE_2X)?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="col-md-offset-1 col-md-10 col-md-offset-1">
            <!--<ul class="main-menu">
                <li><a href="#">home</a></li>
                <li><a href="#">news</a></li>
                <li><a href="#">shop</a></li>
                <li><a href="#">catalog</a></li>
                <li><a href="#">media</a></li>
                <li><a href="#">for partners</a></li>
                <li><a href="#">contacts</a></li>
            </ul>-->
            <?php echo Nav::widget([
                'options' => ['class' => 'main-menu'],
                'items' => [
                    ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                    ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                    ['label' => Yii::t('frontend', 'Shops'), 'url' => ['/shop/index']],
                    ['label' => Yii::t('frontend', 'Franchising'), 'url' => ['/page/view', 'slug'=>'franchising']],
                    ['label' => Yii::t('frontend', 'Human Resources'), 'url' => ['/page/view', 'slug'=>'hr']],
                    ['label' => Yii::t('frontend', 'Media'), 'url' => ['/page/view', 'slug'=>'media']],
                    ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
                    ['label' => Yii::t('frontend', 'Miss Jassmine'), 'url' => ['/page/view', 'slug'=>'miss']],
                    ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
                    ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
                    ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
                    [
                        'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                        'visible'=>!Yii::$app->user->isGuest,
                        'items'=>[
                            [
                                'label' => Yii::t('frontend', 'Settings'),
                                'url' => ['/user/default/index']
                            ],
                            [
                                'label' => Yii::t('frontend', 'Backend'),
                                'url' => Yii::getAlias('@backendUrl'),
                                'visible'=>Yii::$app->user->can('manager')
                            ],
                            [
                                'label' => Yii::t('frontend', 'Logout'),
                                'url' => ['/user/sign-in/logout'],
                                'linkOptions' => ['data-method' => 'post']
                            ]
                        ]
                    ],

                ]
            ]); ?>

        </nav>
    </header>


    <?php echo $content ?>

<?php $this->endContent() ?>