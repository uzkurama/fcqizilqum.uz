<?php

namespace app\widgets;

use app\models\Language;
use yii\base\Widget;
use app\models\MainSlider;

class MainSliderWidget extends Widget
{
    public function run()
    {
        $slider = MainSlider::find()->where(['language_id' => Language::find()->select(['id'])->where(['iso_name' => \Yii::$app->language])->one()])->all();
        return $this->render('main-slider', [
            'slider' => $slider,
        ]);
    }
}