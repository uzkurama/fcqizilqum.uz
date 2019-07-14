<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Language;
use app\models\Contact;


class HeaderWidget extends Widget
{
    public function run()
    {
        $contacts = Contact::find()->all();
        $all = Language::find()->where(['status' => '1'])->orderBy('position ASC')->all();
        return $this->render('header', [
            'all' => $all,
            'contacts' => $contacts,
        ]);
    }
}