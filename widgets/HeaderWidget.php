<?php

namespace app\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Contact;

class HeaderWidget extends Widget
{
    public function run()
    {
    	$contact = Contact::find()->all();
        return $this->render('header', [
        	'contact' => $contact,
        ]);
    }
}
