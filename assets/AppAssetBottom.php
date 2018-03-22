<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use \yii\web\View;
/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetBottom extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/modernizr.min.js',
        'js/jquery.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/metisMenu.min.js',
        'js/waves.js',
        'js/jquery.slimscroll.js',
        'plugins/waypoints/lib/jquery.waypoints.min.js',
        'plugins/counterup/jquery.counterup.min.js',
        'pages/jquery.dashboard.init.js',
        'js/jquery.core.js',
        'js/jquery.app.js'
    ];
    public $depends = [
    ];

    public function init() {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }
}
