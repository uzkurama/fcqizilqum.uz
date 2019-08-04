<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\FontAwesomeAsset;


if(Yii::$app->language == null) {
    Yii::$app->language = 'uz';
}

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
<?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]) ?>
<div class=wrapper>
    <?= \app\widgets\HeaderWidget::widget();?>
    <?php if (\app\controllers\SiteController::getStatus(15, 'value') == 0 && \app\controllers\SiteController::getMatchDate() != null){
        echo \app\widgets\NextMatchWidget::widget();
    }
    else if(\app\controllers\SiteController::getStatus(15, 'value') == 1 || \app\controllers\SiteController::getMatchDate() == null) {
        echo \app\widgets\MainSliderWidget::widget();
    }
    ?>
    <?= \app\widgets\NewsWidget::widget();?>
    <section class="matchSchedule" style="padding: 10px 0;">
        <div class=container>
            <div class=row>
                <?= \app\widgets\MatchScheduleWidget::widget();?>
                <?= $content;?>
            </div>
        </div>
    </section>
    <?= \app\widgets\VideoWidget::widget();?>
    <?= \app\widgets\AboutWidget::widget();?>
    <?= \app\widgets\FooterWidget::widget();?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
