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
        'plugins/jquery-ui/jquery-ui.min.css',
        'css/bootstrap.min.css',
        'css/icons.css',
        'css/metismenu.min.css',
        'css/style.css',
        'css/styles-new.css',
        'css/styles-carousel.css',
        'plugins/fullcalendar/css/fullcalendar.min.css',
        'css/my-style.css',
        'plugins/jquery-toastr/jquery.toast.min.css',
    ];
    public $js = [
        'js/modernizr.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/metisMenu.min.js',
        'js/waves.js',
        'js/jquery.slimscroll.js',
        'plugins/jquery-toastr/jquery.toast.min.js',
        'plugins/moment/moment.js',
        'plugins/waypoints/lib/jquery.waypoints.min.js',
        'plugins/counterup/jquery.counterup.min.js',
        'plugins/counterup/jquery.counterup.min.js',
        'plugins/fullcalendar/js/fullcalendar.min.js',
        'pages/jquery.calendar.js',
        'js/jquery.core.js',
        'js/jquery.app.js',
        'js/myajax.js',
        'js/search.js',
        'js/script.js',
        'js/carousel.js',
        'js/modal.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
