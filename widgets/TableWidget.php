<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;

class TableWidget extends Widget
{
    public function run()
    {
        return $this->render('table');
    }
}