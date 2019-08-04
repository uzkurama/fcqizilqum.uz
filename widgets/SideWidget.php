<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\News;

class SideWidget extends Widget
{
    public function run()
    {
        $club = News::find()->where(['type' => 0])->limit(2)->orderBy('date DESC')->all();
        $boshqarma = News::find()->where(['type' => 1])->limit(2)->orderBy('date DESC')->all();
        return $this->render('side', [
            'club' => $club,
            'boshqarma' => $boshqarma,
        ]);
    }
}