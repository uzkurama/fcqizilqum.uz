<?php
namespace app\assets;
use yii\web\AssetBundle;
/**
 * Main frontend application asset bundle.
 */
class DateTimeAsset extends AssetBundle
{
    public $sourcePath = '@bower/';
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js',
    ];
}