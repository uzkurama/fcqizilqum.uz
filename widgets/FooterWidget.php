<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Contact;


class FooterWidget extends Widget
{
    public function run()
    {
        $contacts = Contact::find()->all();
        return $this->render('footer', [
            'contacts' => $contacts,
        ]);
    }
}