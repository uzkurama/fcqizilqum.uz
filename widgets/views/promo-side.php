<?php

$this->registerJs("$(document).ready(function(){
    $('#promo-side').sticky({topSpacing: 80, responsiveWidth: true, bottomSpacing: 50});
  });", yii\web\View::POS_END);
?>

<style>
    .promo-side {
        left: 71%;
        padding-left: 5px;
        padding-right: 5px;
    }
    @media (min-width: 1400px) {
        .promo-side {
            left: 66%;
            padding-left: 5px;
            padding-right: 5px;
        }
    }
</style>

<aside id="promo-side" class="promo-side">
    <img src="<?= Yii::$app->request->baseUrl.'/images/player/player02.jpg';?>" width="315" height="315" alt="">
</aside>