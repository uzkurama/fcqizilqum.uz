<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Videogallery;

class VideoWidget extends Widget
{
    public $enableCsrfValidation = false;
    public function run()
    {
        $videos = Videogallery::find()->orderBy('date DESC')->all();
        return $this->render('video', [
            'videos' => $videos,
        ]);
    }
}