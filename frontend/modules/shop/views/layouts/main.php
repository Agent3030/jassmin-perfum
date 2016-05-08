<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
/* @var $content string */

$this->beginContent('@frontend/modules/shop/views/layouts/base.php')
?>
   <div class = "col-md-12">
       <?php echo $content ?>
   </div>

<?php $this->endContent() ?>