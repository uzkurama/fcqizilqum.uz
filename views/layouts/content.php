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
    <div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner>
            <h2 style="font-size: 60px;" class=bannerHeadline><?= $this->title;?></h2>
            <?= \yii\widgets\Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'center breadcrumb'],
                'homeLink' => ['label' => Yii::t('app', 'Bosh sahifa'), 'url' => Yii::$app->homeUrl],
            ]) ?>
        </div>
    </div>
    <section class="innerpage_all_wrap bg-white">
        <div class="container">
            <?= $content;?>
        </div>
    </section>
    <?= \app\widgets\FooterWidget::widget();?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
