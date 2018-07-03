<?php

namespace app\assets;

use yii\web\AssetBundle;

class ImAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    	'css/chat.css',
    ];

    public $js = [
        'js/moment.js',
    	'js/chat.js'
    ];
}
