<?php

namespace app\modules\ux_admin;

/**
 * ux_admin module definition class
 */
class ux_admin extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\ux_admin\controllers';

    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
