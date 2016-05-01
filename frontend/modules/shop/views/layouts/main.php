<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
/* @var $content string */

$this->beginContent('@frontend/modules/shop/views/layouts/base.php')
?>
    <section class="about">
        <div class="container">
            <div class="about-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="about-head">perfume</h1>
                        <h4 class="about-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt numquam neque quam doloremque! Mollitia quibusdam beatae hic magnam veritatis expedita itaque recusandae, maiores eum, dolore eligendi odio culpa nesciunt voluptas.</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><img src="../img/perfumebottles.png" class="img-responsive"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="facts-head">
                                    <h2><span>10</span> years</h2>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="facts-body">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="facts-head">
                                    <h2><span>100</span> partners</h2>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="facts-body">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="facts-head">
                                    <h2><span>5</span> branches</h2>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="facts-body">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-check-square-o"></i> Lorem ipsum dolor sit amet consectetur</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="to-begin" class="arrow-up">
            <p> <i class="fa fa-arrow-circle-up fa-2x"></i></p>
        </div>
        <div id="to-news" class="arrow-down">
            <p> <i class="fa fa-arrow-circle-down fa-2x"></i></p>
        </div>
    </section>
    <div data-parallax="scroll" data-image-src="../img/orchid-flowers-blurred.png" class="parallax-window"></div>
     <?php echo $content; ?>
    <div data-parallax="scroll" data-image-src="../img/orchid-flowers-blurred.png" class="parallax-window"></div>
    <section class="products">
        <div class="container">
            <div class="products-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1>our products</h1>
                        <h4>We propose on ukrainan market best quality original perfums and cosmetics of famous brands  </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="products-images">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="perfumes">
                                <h3>Perfumes</h3><img src="../img/perfumes.png" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div class="cosmetics">
                                <h3>Cosmetics</h3><img src="../img/cosmetics.png" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="to-news-up" class="arrow-up">
            <p> <i class="fa fa-arrow-circle-up fa-2x"></i></p>
        </div>
    </section>
    <section class="brands">
        <div class="container-fluid">
            <div class="col-md-2"><img src="../img/brand_icons/tierry_mugler.png" class="img-responsive"></div>
            <div class="col-md-2"><img src="../img/brand_icons/Logo_Azzaro.png" class="img-responsive"></div>
            <div class="col-md-2"><img src="../img/brand_icons/Chanel-logo.png" class="img-responsive"></div>
            <div class="col-md-2"><img src="../img/brand_icons/Givenchy-logo.png" class="img-responsive"></div>
            <div class="col-md-2"><img src="../img/brand_icons/Boss-logo.png" class="img-responsive"></div>
            <div class="col-md-2"><img src="../img/brand_icons/Bvlgari-logo.png" class="img-responsive"></div>
        </div>
        <div id="to-partners" class="arrow-down">
            <p> <i class="fa fa-arrow-circle-down fa-2x"></i></p>
        </div>
    </section>
    <div data-parallax="scroll" data-image-src="../img/orchid-flowers-blurred.png" class="parallax-window"></div>
    <section class="partners">
        <div class="container">
            <div class="partners-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1>parntership</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <div class="img-part"><img src="../img/cart.svg" class="img-responsive"></div>
                        <div class="content-part">
                            <h4>Large Assortment</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet ducimus ut soluta enim voluptatem quam, voluptatum in dicta mollitia, sunt dolorem vitae facere deserunt pariatur maiores explicabo eum, illum.</p>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="img-part"><img src="../img/money.svg" class="img-responsive"></div>
                        <div class="content-part">
                            <h4>Finance support</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet ducimus ut soluta enim voluptatem quam, voluptatum in dicta mollitia, sunt dolorem vitae facere deserunt pariatur maiores explicabo eum, illum. 	 	</p>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="img-part"><img src="../img/phone.svg" class="img-responsive"></div>
                        <div class="content-part">
                            <h4>Marketing support</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet ducimus ut soluta enim voluptatem quam, voluptatum in dicta mollitia, sunt dolorem vitae facere deserunt pariatur maiores explicabo eum, illum.</p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <div class="img-part"><img src="../img/stock.svg" class="img-responsive"></div>
                        <div class="content-part">
                            <h4>Goods on stock</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet ducimus ut soluta enim voluptatem quam, voluptatum in dicta mollitia, sunt dolorem vitae facere deserunt pariatur maiores explicabo eum, illum.</p>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="img-part"><img src="../img/clock.svg" class="img-responsive"></div>
                        <div class="content-part">
                            <h4>Fast logistics</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem eveniet ducimus ut soluta enim voluptatem quam, voluptatum in dicta mollitia, sunt dolorem vitae facere deserunt pariatur maiores explicabo eum, illum.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="part-button"><a href="#" class="part-btn">Become our partner</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="to-prod-up" class="arrow-up">
            <p> <i class="fa fa-arrow-circle-up fa-2x"></i></p>
        </div>
    </section>

<?php $this->endContent() ?>