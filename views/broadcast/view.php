<?php
    $this->title = $model['name'];
    $this->params['breadcrumbs'][] = ['label' => 'Список трансляции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12 card-box">
        <iframe class="col-12" id="broadcast-player" width="500" height="500" src="<?=$model['link']?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>