<?php
    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Список трансляции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .overlay {
        position: absolute;
        top: 0;
        margin: 20px 15px 15px 15px;
        width: calc(100% - 70px);
        height: 100%;
        background-image: -webkit-linear-gradient(top, black, black 10%, transparent 10%, transparent 100%);
    }
</style>

<div class="row">
    <div class="col-12 card-box" style="position:relative; ">
        <iframe class="col-12" id="broadcast-player" width="500" height="700" src="<?= $model->link ?>?autoplay=1" frameborder="0" allow="autoplay; encrypted-media;" allowfullscreen></iframe>
        <div class="col-12 overlay"></div>
    </div>
</div>

<script>
    function concealment(){
      $('.overlay').css('background-image', 'none')
    }
    setTimeout(concealment, 8000);
</script>