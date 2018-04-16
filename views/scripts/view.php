<?php if (!$reset) {?>
	<div class="m-b-30">
		<?=$data['content']?>
	</div>

	<?php if ($answers) { 
			foreach ($answers as $answer) { if (!$answer['redir']) $answer['redir'] = $answer['id']; ?>
			<div class="m-b-30">
				<button type="button" class="btn btn-light waves-effect w-lg" style="padding: 10px 40px;" onclick = "ajax('update', 'id=<?=$answer['redir']?>', 'scripts')"><?=$answer['answer']?></button>
			</div>
		<?php } 
	} else {?>
		<div style="font-size: 10px">
			Скрипт завершен!

		</div>
		<div>
			<a href = "#restart" onclick="ajax('update', 'id=reset', 'scripts')">Вернуться в начало скрипта</a>
		</div>
	<?php } ?>

<?php } else { ?>
	<?php foreach ($scripts as $script): ?>
		<a href="#src" onclick = "ajax('update', 'id=<?=$script['id']?>', 'scripts')"><?=$script['answer']?></a> <br> 
	<?php endforeach ?>
	<?php 
}
?>