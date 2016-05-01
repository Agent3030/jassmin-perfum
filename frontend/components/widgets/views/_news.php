<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 31.03.16
 * Time: 23:15
 */
use yii\helpers\Html;
use Yii;

?>
<?php if ((Yii::$app->language == 'en-US')):?>
<div class="col-md-4">
    <div class="thumbnail news-tab"><?=Html::a(Html::img(
            Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => $model->thumbnail_path,

            ], true),
            ['class' => 'img-responsive']
        ), ['/article/view', 'slug' => $model->slug]);?>
        <div class="caption">
            <h3><?=Html::encode($model->title)?></h3>
            <p> <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?></p>
            <p>  <?php echo \yii\helpers\StringHelper::truncate($model->body, 150, '...', null, true) ?></p>
            <?=Html::a(Html::encode('Read More...'), ['url' => ['/article/view', 'slug' => $model->slug]]); ?>
        </div>
    </div>
</div>

<?php else: ?>

<div class="col-md-4">
    <div class="thumbnail news-tab"><?=Html::a(Html::img(
            Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => $model->thumbnail_path,

            ], true),
            ['class' => 'img-responsive']
        ), ['/article/view', 'slug' => $model->slug]);?>
        <div class="caption">
            <h3><?=Html::encode($model->articleI18->title)?></h3>
            <p> <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?></p>
            <p>  <?php echo \yii\helpers\StringHelper::truncate($model->articleI18->body, 150, '...', null, true) ?></p>
            <?=Html::a(Html::encode('Read More...'), ['url' => ['/article/view', 'slug' => $model->slug]]); ?>
        </div>
    </div>
</div>

<?php endif; ?>


