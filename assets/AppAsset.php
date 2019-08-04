<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/vendor.css',
        'css/style.css',
        'css/layerslider.css',
        'css/progressive-image.css',
        'css/pace.css',
    ];
    public $js = [
        'js/vendor/modernizr.js',
        'js/vendor/vendor.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.26/moment-timezone.min.js',
        'js/main.js',
        'js/progressive-image.js',
        'js/jquery.sticky.js',
        'js/vendor/pace.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
