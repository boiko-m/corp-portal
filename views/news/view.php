<?php

/* @var $this yii\web\View */
use yii\helpers\html;
use yii\widgets\Pjax;
use yii\widgets\Date;

$this->title = 'Новость';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>".print_r($users, true)."</pre>";
?>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card-box">
            <h5 class="card-title"><?=$news['title']?></h5>
            <p class="card-text"><?=htmlspecialchars_decode($news['content'])?></p>
            <p class="card-text">
                <small class="text-muted">от <?php echo date("d.m.Y h:s:m", $news['date']) ?></small>
            </p>
        </div>
    </div>

</div>
