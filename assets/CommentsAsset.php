<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class CommentsAsset
 * @package ogheo\comments\assets
 */
class CommentsAsset extends \ogheo\comments\assets\CommentsAsset
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $sourcePath = '@web';

    public $css = [
    	'css/comments.css',
    ];

    public $js = [
    	'js/comments.js',
    ];
}