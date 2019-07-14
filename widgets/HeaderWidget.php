<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Language;


class HeaderWidget extends Widget
{
    public function run()
    {
        $all = Language::find()->where(['status' => '1'])->orderBy('position ASC')->all();
        return $this->render('header', [
            'all' => $all,
        ]);
    }
}