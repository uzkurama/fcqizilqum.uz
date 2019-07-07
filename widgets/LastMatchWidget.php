<?php

namespace app\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Matches;

class LastMatchWidget extends Widget
{
    public function run()
    {
    	$details = Matches::find()->all();
        return $this->render('last_match', [
        	'details' => $details,
        ]);
    }
}
