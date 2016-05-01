<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;
use Yii;

?>

<hr/>

<?php if ((Yii::$app->language == 'en-US')):?>

    <div class="row">
        <div class="col-md-12">
            <div class = "article-thumbnail">
                <?php if ($model->thumbnail_path): ?>
                    <?php echo Html::a(Html::img(
                        Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => $model->thumbnail_path,

                        ], true),
                        ['class' => 'img-responsive']
                    ),['/article/view','slug' => $model->slug]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-7 title">
            <h4><?php echo Html::a($model->title, ['view', 'slug'=>$model->slug]) ?></h4>
        </div>
        <div class="col-md-3 date">
            <h6>
                <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?>
            </h6>
        </div>
        <div class="col-md-2 category">
            <h5>
                <?php echo Html::a(
                    $model->category->title,
                    ['index', 'ArticleSearch[category_id]' => $model->category_id]
                )?>
              </h5>
        </div>
    </div>
    <div class="row">
        <div class = "col-md-12">
            <p>
                <?php echo \yii\helpers\StringHelper::truncate($model->body, 150, '...', null, true) ?>
            </p>
        </div>
    </div>

<?php else: ?>

    <div class="row">
        <div class="col-md-12">
            <div class = "article-thumbnail">
                <?php if ($model->thumbnail_path): ?>
                    <?php echo Html::a(Html::img(
                        Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => $model->thumbnail_path,

                        ], true),
                        ['class' => 'img-responsive']
                    ),['/article/view','slug' => $model->slug]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-7 title">
            <h4><?php echo Html::a($model->articleI18->title, ['view', 'slug'=>$model->slug]) ?></h4>
        </div>
        <div class="col-md-3 date">
            <h5>
                <?php echo Yii::$app->formatter->asDatetime($model->created_at) ?>
            </h5>
        </div>
        <div class="col-md-2 category">
            <h5>
                <?php echo Html::a(
                    $model->category->articleCategoryI18->title,
                    ['index', 'ArticleI18Search[category_id]' => $model->articleI18->categoryI18_id]
                )?>
            </h5>
        </div>
    </div>
    <div class="row">
        <div class = "col-md-12">
            <p>
                <?php echo \yii\helpers\StringHelper::truncate($model->articleI18->body, 150, '...', null, true) ?>
            </p>
        </div>
    </div>

<?php endif; ?>