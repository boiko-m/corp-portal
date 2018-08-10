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

    	'js/conversation/chat.js',
        'js/conversation/modal.js',
        'js/conversation/attachment.js',
        'js/conversation/dialog.js',
        'js/conversation/tutorial.js',

    	'plugins/custombox/js/legacy.min.js',
    	'plugins/custombox/js/custombox.min.js',
    ];
}
