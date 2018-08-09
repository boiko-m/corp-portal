<?php

namespace app\assets;

use yii\web\AssetBundle;

class ImAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    	'css/chat.css',
    	'plugins/custombox/css/custombox.min.css',
    ];

    public $js = [
        'js/moment.js',
    	'js/chat.js',
    	'plugins/custombox/js/legacy.min.js',
    	'plugins/custombox/js/custombox.min.js',
    ];
}
