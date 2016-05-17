<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;
use Yii;

?>

<?php if (Yii::$app->language === 'en-US'):?>

    <div class = "col-md-3">
        <div class = "partner-adress">
            <div class = "name">
                <h4><?=Html::encode($model->partners->full_name)?></h4>
            </div>
            <div class = "adress">
                <p><span class = "head"><?=Html::encode('city: ')?> </span><?=Html::encode($model->city)?></p>
                <p><span class = "head"><?=Html::encode('index: ')?></span><?=Html::encode($model->index)?></p>
                <p><span class = "head"><?=Html::encode('adress: ')?></span><?=Html::encode($model->street).' '.Html::encode($model->house)?></p>


            </div>
        </div>

    </div>


    <?php else: ?>



    <div class = "col-md-3">
        <div class = "partner-adress">
            <div class = "name">
                <h4><?=Html::encode($model->partnersI18->full_name)?></h4>
            </div>
            <div class = "adress">
                <p><span class = "head"><?=Html::encode('Город: ')?> </span><?=Html::encode($model->city)?></p>
                <p><span class = "head"><?=Html::encode('Индекс: ')?></span><?=Html::encode($model->adresses->index)?></p>
                <p><span class = "head"><?=Html::encode('Адрес: ')?></span><?=Html::encode($model->street).' '.Html::encode($model->adresses->house)?></p>


            </div>
        </div>

    </div>


<?php endif;?>