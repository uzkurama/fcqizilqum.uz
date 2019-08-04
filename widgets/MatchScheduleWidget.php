<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Matches;
use app\models\Scoreboard;

class MatchScheduleWidget extends Widget
{
    public function run()
    {
        $id = Yii::$app->request->isAjax;
        $matches = Matches::find()->where(['>','date', date('U')])->orderBy('date ASC')->all();
        $last = Matches::find()->where(['<','date', date('U')])->orderBy('date DESC')->one();
        $table = Scoreboard::find()->where(['id' => $id])->orderBy('date DESC')->one();
        return $this->render('match-schedule', [
            'matches' => $matches,
            'table' => $table,
            'last' => $last,
        ]);
    }
}