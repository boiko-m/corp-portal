<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
// $this->params['breadcrumbs'][] = ['label' => 'Project News', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-news-view">

   <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card-box">
      	<h5>Кратное описание</h5>
      	<p style="font-size: 12px; padding: 5px;"><?= $model->short_description ?></p>
      	<h5>Содержание</h5>
        <p class="card-text"><?= htmlspecialchars_decode($model->content) ?></p>

</div>
