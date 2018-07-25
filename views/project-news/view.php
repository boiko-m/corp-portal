<?php
    use yii\helpers\html;
    use yii\widgets\Pjax;
    use yii\widgets\Date;
    use hauntd\vote\widgets\Like;

    $this->title = 'Новости проектов';
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card-box">
            <h5 class="card-title"><?= $news['title'] ?></h5>
            <p style="font-size: 12px; padding: 5px;"><?= $news['short_description'] ?></p>
            <p class="card-text"><?= htmlspecialchars_decode($news['content']) ?></p>

            <hr>
            <p class="card-text">
                <small class="text-muted">от <?php echo date("d.m.Y h:s:m", $news['create_at']) ?></small>
            </p>
        </div>
    </div>
</div>