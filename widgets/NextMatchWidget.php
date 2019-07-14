<?php

namespace app\widgets;

use yii\base\Widget;


class NextMatchWidget extends Widget
{
    public function run()
    {
        return $this->render('next-match');
    }
}
