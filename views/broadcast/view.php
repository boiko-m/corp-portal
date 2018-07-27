<?php
    $this->title = $model['name'];
    $this->params['breadcrumbs'][] = ['label' => 'Список трансляции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .overlay {
        position: absolute;
        top: 0;
        width: 97%;
        height: 100%;
    }
</style>

<div class="row">
    <div class="col-12 card-box" style="position:relative">
        <iframe class="col-12" id="broadcast-player" width="500" height="700" src="<?=$model['link']?>?autoplay=1" frameborder="0" allow="autoplay; encrypted-media;" allowfullscreen></iframe>
        <div class="overlay"></div>
    </div>
</div>