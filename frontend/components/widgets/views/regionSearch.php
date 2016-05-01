<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 02.04.16
 * Time: 20:24
 */


use yii\helpers\Html;
use yii\helpers\Url;


;?>


<?=Html::BeginForm(['partners/search-region'], 'get');?>
<div class="col-md-6">
    <div class="form-group region-search-group">
        <?=Html::dropDownList('city', $model->city, $item,['class' => 'form-control region-search-control']); ?>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group region-search-group">
        <?= Html::submitButton('search', ['class'=>'form-control', 'class'=>'form-control search-btn']) ?>
    </div>
</div>
<div class = "col-md-3">
</div>
<?=Html::EndForm(); ?>
