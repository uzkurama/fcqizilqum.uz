<?php


?>
<?= \edofre\sliderpro\SliderPro::widget([
  'id' => 'my-slider',
  'sliderOptions' => [
    'width'  => auto,
    'height' => 650,
    'arrows' => true,
    'buttons' => false,
    'fade' => true,
    'touchSwipe' => false,
  ],
]);
?>

<div class="slider-pro" id="my-slider">
	<div class="sp-slides">
        <?php foreach ($slider as $s):?>
		<div class="sp-slide">
			<img class="sp-image" style="margin: 0;" src="<?= Yii::$app->request->baseUrl. $s->image;?>"/>
            <h2 class="sp-layer sp-black"
				data-position="bottomLeft" data-horizontal="10%"
				data-show-transition="left" data-show-delay="300" data-hide-transition="right">
				<?= \app\components\DefaultComponent::name($s->title);?>
            </h2>
		</div>
        <?php endforeach;?>
	</div>
</div>
