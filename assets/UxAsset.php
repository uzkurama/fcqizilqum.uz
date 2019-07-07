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
class UxAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
        'ux-admin/css/bootstrap.min.css',
        'ux-admin/css/paper-dashboard.css',
    ];
    public $js = [
        'ux-admin/js/core/jquery.min.js',
        'ux-admin/js/core/popper.min.js',
        'ux-admin/js/core/bootstrap.min.js',
        'ux-admin/js/plugins/perfect-scrollbar.jquery.min.js',
        'ux-admin/js/plugins/bootstrap-notify.js',
        'ux-admin/js/paper-dashboard.min.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}