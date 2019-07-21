<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Matches;

class MatchScheduleWidget extends Widget
{
    public function run()
    {
        $matches = Matches::find()->where(['>','date', date('U')])->orderBy('date DESC')->all();
        return $this->render('match-schedule', [
            'matches' => $matches,
        ]);
    }
}