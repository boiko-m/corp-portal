<?php

namespace app\assets;

use yii\web\AssetBundle;

class QuestionnaireAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    	'css/questionnaire.css',
    ];

    public $js = [
    	'js/questionnaire.js'
    ];
}
