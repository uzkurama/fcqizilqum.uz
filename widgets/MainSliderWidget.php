<?php

namespace app\widgets;

use app\models\Language;
use yii\base\Widget;
use app\models\MainSlider;

class MainSliderWidget extends Widget
{
    public function run()
    {
        $slider = MainSlider::find()->all();
        return $this->render('main-slider', [
            'slider' => $slider,
        ]);
    }
}