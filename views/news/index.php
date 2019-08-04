<?php

use \kop\y2sp\ScrollPager;

if ($type == 0){
    $this->title = Yii::t('app','Klub yangiliklari');
}
elseif ($type == 1){
    $this->title = Yii::t('app','Boshqarma yangiliklari');
}
else{
    $this->title = Yii::t('app','Yangiliklari');
}

$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #item_tag a {
        color: #b81e20;
        font-size: 12px;
        padding: 0.5vh;
        border: 1px #b81e20 solid;
        border-radius: 4px;
        transition: all 0.4s ease-in-out;
    }
</style>

<div class=innerWrapper>
    <main id="article" class=contentinner>
    <?= \yii\widgets\ListView::widget([
        'id' => 'news-list',
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'itemOptions' => ['class' => 'news-item'],
        'summary' => '',
        'pager' => [
            'class' => ScrollPager::className(),
            'item' => '.news-item',
            'enabledExtensions' => [
                ScrollPager::EXTENSION_SPINNER,
                ScrollPager::EXTENSION_NONE_LEFT,
            ],
            'noneLeftText' => Yii::t('app', 'Oxiriga yetdiz').'! :)',
        ],
    ])?>
    </main>
    <?= \app\widgets\PromoSideWidget::widget();?>
</div>

