<?php
use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "container">
<?php if ((Yii::$app->language == 'en-US')):?>

<div class="col-md-12">
    <div class="contacts-content-main">
        <h1><?php echo Yii::t('frontend', 'contacts') ?></h1>


        <div class = "row">
            <div class="col-md-8 head-office-map">
                <?php echo \app\components\widgets\GoogleMaps::widget([
                    'lntlng'=> $latLng,
                    'zoom' => $zoom,
                    'size' => ['width' => '100%', 'height' => '700px'],
                    'markers' => $markers
                ]);?>

            </div>
            <div class="col-md-4 head-office-content">
                <div class="col-md-12">
                    <?php foreach ($headOffice as $model):?>
                        <h2>head office</h2>
                        <h3 class ="address">adress</h3>
                        <ul>
                            <li><span>city:</span><?= Html::encode($model->city)?></li>
                            <li><span>region:</span><?= Html::encode($model->region)?></li>
                            <li><span>street:</span><?= Html::encode($model->street)?></li>
                            <li><span>house:</span><?= Html::encode($model->house)?></li>
                            <?php if ($model->appartment):?>
                            <li><span>appartment:</span><?= Html::encode($model->appartment)?></li>
                            <?php endif; ?>
                            <li><span>index:</span><?= Html::encode($model->index)?></li>
                        </ul>
                        <h3 class = "tel">tel.:</h3>
                        <p><?= Html::encode($model->tel) ?></p>
                    <?php endforeach; ?>
                    </div>

                <div class="col-md-12">
                    <?php foreach ($stocks as $model):?>
                        <h2>stocks</h2>
                        <h3 class ="address">adress</h3>
                        <ul>
                            <li><span>city:</span><?= Html::encode($model->city)?></li>
                            <li><span>region:</span><?= Html::encode($model->region)?></li>
                            <li><span>street:</span><?= Html::encode($model->street)?></li>
                            <li><span>house:</span><?= Html::encode($model->house)?></li>
                            <?php if ($model->appartment):?>
                                <li><span>appartment:</span><?= Html::encode($model->appartment)?></li>
                            <?php endif; ?>
                            <li><span>index:</span><?= Html::encode($model->index)?></li>
                        </ul>
                        <h3 class = "tel">tel.:</h3>
                        <p><?= Html::encode($model->tel) ?></p>
                    <?php endforeach; ?>
                </div>
             </div>
            <div class ="col-md-12 contact-button">
                <?= Html::a('leave message', ['/site/contact-message'], ['class' => 'contact-message-button']); ?>
            </div>

        </div>


    </div>


</div>

<?php else:?>

<div class="col-md-12">
    <div class="contacts-content-main">
        <h1><?php echo Yii::t('frontend', 'contacts') ?></h1>

        <div class = "row">
            <div class="col-md-8 head-office-map">
                <?php echo \app\components\widgets\GoogleMaps::widget([
                    'lntlng'=> $latLng,
                    'zoom' => $zoom,
                    'size' => ['width' => '100%', 'height' => '700px'],
                    'markers' => $markers,
                ]);?>

            </div>
            <div class="col-md-4 head-office-content">
                <div class="col-md-12">
                    <?php foreach ($headOffice as $model):?>
                        <h2>head office</h2>
                        <h3 class ="address">adress</h3>
                        <ul>
                            <li><span>city:</span><?= Html::encode($model->city)?></li>
                            <li><span>region:</span><?= Html::encode($model->region)?></li>
                            <li><span>street:</span><?= Html::encode($model->street)?></li>
                            <li><span>house:</span><?= Html::encode($model->offices->house)?></li>
                            <?php if ($model->offices->appartment):?>
                                <li><span>appartment:</span><?= Html::encode($model->offices->appartment)?></li>
                            <?php endif; ?>
                            <li><span>index:</span><?= Html::encode($model->offices->index)?></li>
                        </ul>
                        <h3 class = "tel">tel.:</h3>
                        <p><?= Html::encode($model->offices->tel) ?></p>
                    <?php endforeach; ?>
                </div>

                <div class="col-md-12">
                    <?php foreach ($stocks as $model):?>
                        <h2>stocks</h2>
                        <h3 class ="address">adress</h3>
                        <ul>
                            <li><span>city:</span><?= Html::encode($model->city)?></li>
                            <li><span>region:</span><?= Html::encode($model->region)?></li>
                            <li><span>street:</span><?= Html::encode($model->street)?></li>
                            <li><span>house:</span><?= Html::encode($model->offices->house)?></li>
                            <?php if ($model->offices->appartment):?>
                                <li><span>appartment:</span><?= Html::encode($model->offices->appartment)?></li>
                            <?php endif; ?>
                            <li><span>index:</span><?= Html::encode($model->offices->index)?></li>
                        </ul>
                        <h3 class = "tel">tel.:</h3>
                        <p><?= Html::encode($model->offices->tel) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class ="col-md-12 contact-button">
                <?= Html::a('leave message', ['/site/contact-message'], ['class' => 'contact-message-button']); ?>
            </div>

        </div>




    </div>

</div>

<?php endif; ?>
</div>
