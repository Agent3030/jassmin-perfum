<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 02.05.16
 * Time: 21:42
 */$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <header class = "page-header">
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
                            ['label' => Yii::t('frontend', 'Partners'), 'url' => ['/partners/index', 'slug'=>'partners']],
                            ['label' => Yii::t('frontend', 'News'), 'url' => ['/article/index']],
                            ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['/site/contacts']],
                        ]
                    ]); ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<section class = "page-content">
    <div class = "container">
        <?php echo $content ?>
    </div>
</section>

<?php $this->endContent() ?>
<footer>
    <div class="container">
        <div class="col-md-12">
            <div class="copyright">
                <p><?= FA::icon('copyright')?> DiZo Web Studio, Kyiv, Ukraine 2016</p>
            </div>
        </div>
    </div>
</footer>