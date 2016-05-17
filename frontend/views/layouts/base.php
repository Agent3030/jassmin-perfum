<?php

use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<?php frontend\assets\NewsAsset::register($this)?>
    <header>
        <div class="header-top">
            <div class="container-fluid">
                <div class="col-md-3">
                    <div class="logo-wrapper"><?=Html::a(Html::encode('Perfume'), [''])?></div>
                </div>
                <div class="col-md-6">
                  <?php if(!Yii::$app->user->isGuest): ?>
                    <div class = "welcome">
                        <p> Welcome: <?= Html::encode(Yii::$app->user->identity->username) ?></p>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="col-md-3">
                    <nav class="social">
                        <ul>
                            <ul class="social-head">
                                <li><a href="#"><?=FA::icon('facebook-square')->size(FA::SIZE_2X)?></li>
                                <li><a href="#"><?=FA::icon('instagram')->size(FA::SIZE_2X)?></a></li>
                                <li><a href="#"><?=FA::icon('vimeo-square')->size(FA::SIZE_2X)?></a></li>
                                <li><a href="#"><?=FA::icon('youtube-square')->size(FA::SIZE_2X)?></a></li>
                                <li><a href="#"><?=FA::icon('linkedin-square')->size(FA::SIZE_2X)?></a></li>
                                <li><a href="#"><?=FA::icon('tumblr-square')->size(FA::SIZE_2X)?></a></li>
                            </ul>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container-fluid">
                <div class="col-md-12">
                    <nav>
                     <?php echo Nav::widget([
                            'items' => [
                                ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                                ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                                ['label' => Yii::t('frontend', 'Media'), 'url' => ['/page/view', 'slug'=>'media']],
                                ['label' => Yii::t('frontend', 'Partners'), 'url' => ['/partners/index']],
                                ['label' => Yii::t('frontend', 'News'), 'url' => ['/article/index']],
                                ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['/site/contacts']],
                            ]
                        ]); ?>
                    </nav>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container-fluid">
                <div class="col-md-2">
                    <nav class="lang-menu">
                        <ul>
                            <li><?= Html::a(Html::img('@web/img/britain.png', ['alt' => 'Britain', 'class' => 'img-responsive']),['/site/set-locale', 'locale'=>'en-US']) ?></li>
                            <li> <?= Html::a(Html::img('@web/img/ukraine.png', ['alt' => 'ukraine', 'class' => 'img-responsive']),['/site/set-locale', 'locale'=>'uk-UA']) ?></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-7">
                    <nav class="login-menu">
                      <?php if(Yii::$app->user->isGuest):?>
                        <?php echo Nav::widget([
                             'items' => [
                                ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login']],
                                ['label' => Yii::t('frontend', 'SignUp'), 'url' => ['/user/sign-in/signup']],
                                ['label' => Yii::t('frontend', 'Cart'), 'url' => ['']],
                             ]
                        ]); ?>
                       <?php else: ?>
                        <?php echo Nav::widget([
                            'items' => [
                                ['label' => Yii::t('frontend', 'User Cabinet'), 'url' => ['/user/default/index']],
                                ['label' => Yii::t('frontend', 'User Cart'), 'url' => ['']],
                                ['label' => Yii::t('frontend', 'Orders'), 'url' => ['']],
                                ['label' => Yii::t('frontend', 'Logout'), 'url' => ['/user/sign-in/logout'],'linkOptions' => ['data-method' => 'post']],
                            ]
                        ]); ?>
                       <?php endif; ?>

                    </nav>
                </div>
                <div class="col-md-3">
                    <div class="cart">
                        <div>
                            <?php
                                $cartLink = [FA::icon('cart-arrow-down'),
                                    Html::encode('Shopping Cart:'),
                                    Html::tag('span', Html::encode('$55'), ['class'=>'cart-sum']),
                                    Html::tag('span', Html::encode('(11)'), ['class'=>'cart-qty']),
                                ];
                                $cartLinkStr = implode(' ', $cartLink);
                                echo Html::a($cartLinkStr, ['url' => '']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div data-parallax="scroll" data-image-src="../img/perfum3-stretched-1920-1080.jpg" class="head-image"></div>
        <button type="button" aria-label="toggle menu" class="tcon tcon-menu--xbutterfly"><span aria-hidden="true" class="tcon-menu__lines"></span><span class="tcon-visuallyhidden">toggle menu</span></button>
        <div data-click-state="0" class="min-nav-cover">
            <nav class="min-nav">
                <?php echo Nav::widget([
                    'options' => ['class' => 'min-nav'],
                    'items' => [
                        ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                        ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                        ['label' => Yii::t('frontend', 'Media'), 'url' => ['/page/view', 'slug'=>'media']],
                        ['label' => Yii::t('frontend', 'Partners'), 'url' => ['/page/view', 'slug'=>'partners']],
                        ['label' => Yii::t('frontend', 'News'), 'url' => ['/article/index']],
                        ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['/site/contacts']],
                    ]
                ]); ?>
            </nav>
        </div>

        <div class="shop-button">
            <?= Html::a('Online shop',['/shop/default/index'], ['class' => 'shop-btn']) ?>
        </div>
        <div id="to-about" class="arrow-down">
            <p> <?= FA::icon('arrow-circle-down')?></p>
        </div>
    </header>


    <?php echo $content ?>

    <footer class="footer">
        <div class="container-fluid">
            <div class="col-md-2">
                <nav class="footer-nav">
                    <?php echo Nav::widget([
                        'items' => [
                            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                            ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                            ['label' => Yii::t('frontend', 'Media'), 'url' => ['/page/view', 'slug'=>'media']],
                            ['label' => Yii::t('frontend', 'Partners'), 'url' => ['/page/view', 'slug'=>'partners']],
                            ['label' => Yii::t('frontend', 'News'), 'url' => ['/article/index']],
                            ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['/site/contacts']],
                        ]
                    ]); ?>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="adress">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Adress:</h5>
                                    <p>0XXXX</p>
                                    <p>Someone str.</p>
                                    <p>Kyiv</p>
                                    <p>Ukraine</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Tel:</h5>
                                    <p>+38(044)XXX-XX-XX</p>
                                    <p>+38(067)XXX-XX-XX</p>
                                    <p>+38(050)XXX-XX-XX</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="cert-wrapper"><?=Html::img('../img/certificate.png', ['class' => 'img-responsive'])?></div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="copyright">
                    <p><?= FA::icon('copyright')?> DiZo Web Studio, Kyiv, Ukraine 2016</p>
                </div>
            </div>
        </div>
    </footer>

<?php $this->endContent() ?>