<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\FontAwesomeAsset;

AppAsset::register($this);
FontAwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class=wrapper>
    <?= \app\widgets\HeaderWidget::widget();?>
    <?php if (\app\controllers\SiteController::getStatus(15, 'value') == 0){
        echo \app\widgets\NextMatchWidget::widget();
    }?>
    <?= \app\widgets\AboutWidget::widget();?>
    <?= \app\widgets\FooterWidget::widget();?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
