<?php
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'news'), 'url' => ['index']];

?>

<?php if ((Yii::$app->language == 'en-US')):
    $this->params['breadcrumbs'][] = $model->title;
    ?>
<div class = "col-md-12">
    <div class="article-content-view">
        <div class = "row">
            <div class="col-md-12 view-head">
                <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]);?>
                <h1><?php echo $model->title ?></h1>

                <h5><?php echo Yii::$app->formatter->asDatetime($model->created_at) ?></h5>
            </div>
        </div>
        <div class = "row">
            <div class="col-md-2">

            </div>
            <div class ="col-md-8 view-img">

                <?php if ($model->thumbnail_path): ?>
                    <?php echo \yii\helpers\Html::img(
                        Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => $model->thumbnail_path,

                        ], true),
                        ['class' => 'img-responsive']
                    ) ?>
                <?php endif; ?>

            </div>
            <div class = "col-md-2">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 view-content">
                <?php echo $model->body ?>
            </div>
        </div>
                <?php if (!empty($model->articleAttachments)): ?>
        <div class = "row">
            <div class="col-md-12 view-attachments">
                <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
                <ul id="article-attachments">
                    <?php foreach ($model->articleAttachments as $attachment): ?>
                        <li>
                            <?php echo \yii\helpers\Html::a(
                                $attachment->name,
                                ['attachment-download', 'id' => $attachment->id])
                            ?>
                            (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
                <?php endif; ?>


    </div>
</div>

<?php else:
    $this->params['breadcrumbs'][] = $modelI18->title;
    ?>

<div class = "col-md-12">
    <div class="article-content-view">
        <div class = "row">
            <div class="col-md-12 view-head">
                <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]);?>
                <h1><?php echo $modelI18->title ?></h1>

                <h5><?php echo Yii::$app->formatter->asDatetime($model->created_at) ?></h5>
            </div>
        </div>
        <div class = "row">
            <div class="col-md-2">

            </div>
            <div class ="col-md-8 view-img">

                <?php if ($model->thumbnail_path): ?>
                    <?php echo \yii\helpers\Html::img(
                        Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => $model->thumbnail_path,

                        ], true),
                        ['class' => 'img-responsive']
                    ) ?>
                <?php endif; ?>

            </div>
            <div class = "col-md-2">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 view-content">
                <?php echo $modelI18->body ?>
            </div>
        </div>
        <?php if (!empty($model->articleAttachments)): ?>
            <div class = "row">
                <div class="col-md-12 view-attachments">
                    <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
                    <ul id="article-attachments">
                        <?php foreach ($model->articleAttachments as $attachment): ?>
                            <li>
                                <?php echo \yii\helpers\Html::a(
                                    $attachment->name,
                                    ['attachment-download', 'id' => $attachment->id])
                                ?>
                                (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>


    </div>
</div>

<?php endif; ?>



