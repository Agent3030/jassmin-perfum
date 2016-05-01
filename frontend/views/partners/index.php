<?php
/* @var $this yii\web\View */
//use \app\components\widgets;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<div class="col-md-12">
    <div class="partners-content-main">
        <h1>partners</h1>
        <?php Pjax::begin(['id' => '#partners-data-wrapper','enablePushState' => false, ]);?>


        <div class = "col-md-6">
            <div class="row">
                <?php echo app\components\widgets\RegionSearch::widget()?>
            </div>
        </div>
        <?php  Pjax::end();?>


        <?php echo \app\components\widgets\GoogleMaps::widget([
            'lntlng'=> $lntlng,
            'zoom' => $zoom,
            'size' => ['width' => '100%', 'height' => '600px'],
            'markers' => $markers
        ]);?>
        <div class = "row">

        <?php echo \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'pager'=>[
                'hideOnSinglePage'=>true,
            ],
            'itemView'=>'_adresses',
            'summary' => false,
        ])?>
        </div>
        </div>
    </div>
</div>