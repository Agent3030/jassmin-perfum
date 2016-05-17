<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\user\models\search\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class = "<?= $flash['options']['class']?>"><?= $flash['body']?></p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('frontend', 'Create Partners'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php if(array_values(Yii::$app->request->queryParams)) : ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'short_name',
            'full_name',
            'prop_form',
            [
                'label'=>'Добавить компанию',
                'format' => 'html',
                'value'=>function ($model) {
                    return Html::a('Подтвердить', ['confirm', 'id' => $model->id]);
                },
            ],
            // 'isVAT',
            // 'VAT_code',
            // 'user_id',
            // 'status_id',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php else: ?>

    <?= Html::encode("Enter user info") ?>
<?php endif;?>

</div>
