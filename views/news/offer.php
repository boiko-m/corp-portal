<?php

use yii\helpers\Html;

$this->title = 'Предложить новость';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-news-offer {
        text-align: center; 
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card-box" style="overflow-x: hidden;">
            <div class="table-responsive wrap-relative">
                <h4 class="title-news-offer"><?= Html::encode($this->title) ?></h4>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
