<?php
namespace app\assets;
use yii\web\AssetBundle;
/**
 * Main frontend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@npm/font-awesome/';
    public $css = [
        'css/all.css',
    ];
}