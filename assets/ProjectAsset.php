<?php

namespace app\assets;

use yii\web\AssetBundle;

class ProjectAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    	'css/project.css',
    	'plugins/custombox/css/custombox.min.css',
    ];

    public $js = [
    	'js/project.js',
    	'plugins/custombox/js/legacy.min.js',
    	'plugins/custombox/js/custombox.min.js',
    ];
}
