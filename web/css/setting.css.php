<?php
	header("Content-type: text/css; charset: UTF-8");
	$backgroundColor = Yii::$app->setting->getValue('navbar-background-color');
?>
 
<!-- /** CSS begins **/ -->
<style>
	.tabs-bordered li a.active {
	   border-bottom: 2px solid <?= $backgroundColor ?> !important;
	}

	.topbar-left {
		background-color: <?= $backgroundColor ?> !important;
	}

	.navbar-custom {
		background-color: <?= $backgroundColor ?> !important;
	}

	.alphabet-wrap {
		background-color: <?= $backgroundColor ?> !important;
	}

	.alphabet-wrap a:hover, .alphabet-wrap a.active {
		border: 3px solid <?= $backgroundColor ?> !important;
	}

	.badge-info-status {
		background-color: <?= $backgroundColor ?> !important;
	}
</style>