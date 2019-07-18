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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'admin_assets/css/bootstrap.min.css',
        'admin_assets/css/animate.min.css',
        'admin_assets/css/light-bootstrap-dashboard.css',
        'http://fonts.googleapis.com/css?family=Roboto:400,700,300',
        'admin_assets/css/pe-icon-7-stroke.css',
    ];
    public $js = [
//        'admin_assets/js/jquery.3.2.1.min.js',
//        'admin_assets/js/bootstrap.min.js',
        'admin_assets/js/light-bootstrap-dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
