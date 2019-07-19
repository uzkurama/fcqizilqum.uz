<?php

namespace app\widgets;

use app\models\Matches;
use yii\base\Widget;


class NextMatchWidget extends Widget
{
    public function run()
    {
        $matches = Matches::find()->where(['status' => 1])->andWhere(['>','date', date('U')])->limit(1)->all();
        return $this->render('next-match', [
            'matches' => $matches,
        ]);
    }
}
