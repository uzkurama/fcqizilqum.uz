<?php

namespace app\components;

use Yii;
use yii\base\BaseObject;
use app\models\Language;
use yii\helpers\ArrayHelper;

class DefaultComponent extends BaseObject
{
    static function name($massiv)
    {
        foreach ($massiv as $a) {
            $current_lang = Language::find()->where(['id' => $a[language]])->select('iso_name')->one();
            if ($current_lang->iso_name == Yii::$app->language) {
                return $a[text];
            }
        }
    }

    static function dropdown($massiv)
    {
        $array[] = [];
        for ($i=0; $i<count($massiv); $i++)
        {
            $array[$i][id] = $massiv[$i][id];
            $array[$i][name] = DefaultComponent::name(json_decode($massiv[$i][name], true));
        }
        return ArrayHelper::map($array, 'id', 'name');
    }
}