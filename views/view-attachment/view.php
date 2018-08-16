<title><?= $model->name ?></title>
<? include 'css/view-attachment.css.php'; ?>
<? include 'css/setting.css.php'; ?>

<div class="row project-news-view">
	<div class="docs_panel_wrap">
	  <div class="docs_panel">
	    <div class="clear_fix" style="padding: 12px 20px 5px 20px;">
				<button href="http://portal.lbr.ru<?= $model->link ?>" onclick="window.location='http://portal.lbr.ru<?= $model->link ?>'" class="flat_button fl_r"">
					Сохранить документ на диск
				</button>
				<a href="http://portal.lbr.ru" target="_blank" onclick="statlogsValueEvent('docs_office365_away', 'button');" class="flat_button secondary_dark fl_r" id="office_365_btn">
					На главную страницу портала
				</a>
	      <div class="docs_info fl_r"></div>
	      <a href="http://portal.lbr.ru<?= $model->link ?>" class="docs_name fl_l" download>
	      	<b><?= $model->name ?></b>
	      </a>&nbsp;
			</div>
		</div>
	</div>
	</div>
	<iframe src='https://view.officeapps.live.com/op/view.aspx?src=http://portal.lbr.ru<?= $model->link ?>' class="iframe" width="100%" height="100%" scrolling='auto' frameborder='0'></iframe>
</div>