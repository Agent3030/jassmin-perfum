<?php

use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/modules/shop/views/layouts/_clear.php')
?>

    <header>
        <div class="header-middle">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="logo-wrapper"><a href="#">Perfume</a></div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group search-group"></div>
                        <input type="text" placeholder="пошук парфюму" class="form-control search-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <nav class="main-menu">
                            <?php echo Nav::widget([
                                'items' => [
                                    ['label' => Html::encode('На головну'), 'url' => ['/site/index/']],
                                    ['label' => Html::encode('Акції'), 'url' => ['/shop/actions/index/']],
                                    ['label' => Html::encode('Кошик'), 'url' => ['/shop/cart/index/']],
                                    ['label' => Html::encode('Кабінет Користувача'), 'url' => ['/shop/cabinet/index/']],
                                    ['label' => Html::encode('Фінанси'), 'url' => ['/shop/finance/index/']],
                                    ['label' => Html::encode('Контакти'), 'url' => ['/site/contacts']],
                                ]
                            ]); ?>
                         </nav>
                    </div>
                </div>
            </div>
            <!--div.main-carousel
            div(class = 'parallaxParent' id = 'parralax1')
                div(id="main-carousel" class="main-carousel carousel slide" data-ride="carousel" data-interval ="5000")
                    ol.carousel-indicators
                        li(data-target="#main-carousel" data-slide-to="0" class="active")
                        li(data-target="#main-carousel" data-slide-to="1")
                        li(data-target="#main-carousel" data-slide-to="2")
                        li(data-target="#main-carousel" data-slide-to="3")
                        li(data-target="#main-carousel" data-slide-to="4")
                    div(class="carousel-inner" role="listbox")
                        div.item.active
                            img(src="../img/perfum2-stretched-1920-1080.jpg" class = "img-responsive")
                            div.carousel-caption
                        div.item
                            img(src="../img/perfum3-stretched-1920-1080.jpg" class = "img-responsive")
                            div.carousel-caption
                        div.item
                            img(src="../img/perfum4-stretched-1920-1080.jpg" class = "img-responsive")
                            div.carousel-caption
                        div.item
                            img(src="../img/perfum5-stretched-1920-1080.jpg" class = "img-responsive")
                            div.carousel-caption
                        div.item
                            img(src="../img/perfum6-stretched-1920-1080.jpg" class = "img-responsive parallax-window")
                            div.carousel-caption
                    a(class="left carousel-control" href="#main-carousel" role="button" data-slide="prev")
                        span(class="glyphicon glyphicon-chevron-left" aria-hidden="true")
                        span(class="sr-only") Previous
                    a(class="right carousel-control" href="#main-carousel" role="button" data-slide="next")
                        span(class="glyphicon glyphicon-chevron-right" aria-hidden="true")
                        span(class="sr-only") Next
            -->
        </div>
        <!--div.head-img-->

    </header>
    <section class="shop">
        <div class="container-fluid">
            <div class="col-md-3">
                <aside class="left-sidebar">
                    <div class="left-menu-header">
                        <h3>Товари</h3>
                    </div>
                    <ul class="left-menu-category">
                        <li><a href="#">стать <i class =  "fa fa-angle-down"></i></a></li>
                        <ul class="left-menu-item">
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="radio" class="radio">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">для жинок <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="radio" class="radio">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">для чоловиків <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </ul>
                    <ul class="left-menu-category">
                        <li><a href="#">бранд <i class =  "fa fa-angle-down"></i></a></li>
                        <ul class="left-menu-item">
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">chanel <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">hugo boss <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">bulgary <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">armany <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </ul>
                    <ul class="left-menu-category">
                        <li><a href="#">об’єм <i class =  "fa fa-angle-down"></i></a></li>
                        <ul class="left-menu-item">
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">10 мл. <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">50 мл. <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox">
                                            </label>
                                        </div>
                                        <div class="col-md-9">		<a href="#">100 мл. <i class =  "fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="content">
                    <?php echo $content ?>
                </div>
            </div>
        </div>
    </section>
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
                <div class="cert-wrapper"><?=Html::img('/img/certificate.png', ['class' => 'img-responsive'])?></div>
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