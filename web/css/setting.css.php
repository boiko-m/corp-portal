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

	.search-a-size a {
		color: <?= $backgroundColor ?> !important;
	}

	.card {
		box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8!important;
		margin-bottom: 1px;
	}

	.im-list-user-message-choose {
		background-color: <?= $backgroundColor ?> !important;
	}

	.upload-drop-zone.drop {
		border-color: <?= $backgroundColor ?> !important;
	}

	.im-dialog-preview-text {
		color: <?= $backgroundColor ?> !important;
	}

	.im-icon-envelope {
		color: <?= $backgroundColor ?> !important;
	}

	.want-to-project {
		color: <?= $backgroundColor ?> !important;
	}

	.icon-project {
		color: <?= $backgroundColor ?> !important;
	}

	.icon-left-menu-broadcast {
		color: <?= $backgroundColor ?> !important;
	}

	.custom-modal-title {
		background-color: <?= $backgroundColor ?> !important;
	}

	.crate-dialog-group-button {
		background-color: <?= $backgroundColor ?> !important;
		border-color: <?= $backgroundColor ?> !important;
	}
</style>