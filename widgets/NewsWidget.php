<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\News;

class NewsWidget extends Widget
{
    public function run()
    {
        $club = News::find()->where(['type' => 0])->limit(6)->orderBy('date DESC')->all();
        $boshqarma = News::find()->where(['type' => 1])->limit(6)->orderBy('date DESC')->all();
        return $this->render('news', [
            'club' => $club,
            'boshqarma' => $boshqarma,
        ]);
    }
}