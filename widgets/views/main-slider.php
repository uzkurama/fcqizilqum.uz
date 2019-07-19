<?php

use kv4nt\owlcarousel\OwlCarouselWidget;

?>
<style>
    .item-class {
    height: 70vh;
    width: 100%;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}

</style>
<?php OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'container-id',
        'class' => 'container-class'
    ],
    'pluginOptions'    => [
        'autoplay'          => true,
        'autoplayTimeout'   => 3000,
        'items'             => 1,
        'loop'              => true,
        'itemsDesktop'      => [1280, 1],
        'itemsDesktopSmall' => [979, 1],
        'dots' => false,
        'autoHeight' => false
    ]
]);
?>
<?php foreach ($slider as $s):?>
<div class="item-class" style="background-image: url(<?= Yii::$app->request->baseUrl.$s->image;?>)"><h3>Hello</h3></div>
<?php endforeach;?>
<?php OwlCarouselWidget::end(); ?>

