<?php

namespace app\assets;

use yii\web\AssetBundle;

class ProjectAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    	'css/project.css',
    ];

    public $js = [
    	'js/project.js'
    ];
}
