<?php

namespace app\widgets;

use yii\base\Widget;


class PromoSideWidget extends Widget
{
    public function run()
    {
        return $this->render('promo-side');
    }
}