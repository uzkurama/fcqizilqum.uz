<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\About;

class AboutWidget extends Widget
{
    public function run()
    {
        $about = About::find()->one();
        return $this->render('about', [
            'about' => $about,
        ]);
    }
}