<?php

namespace app\widgets;

use yii\base\Widget;


class AboutWidget extends Widget
{
    public function run()
    {
        return $this->render('about');
    }
}