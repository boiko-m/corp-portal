<?php
    use yii\helpers\html;
    use yii\widgets\Pjax;
    use yii\widgets\Date;
    use hauntd\vote\widgets\Like;
    use \app\widgets\LbrComments;


    $this->title = 'Новость';
    $this->params['breadcrumbs'][] = $this->title;

    if(!isset($like)){
        $like = '';
    }
?>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card-box">
            <h5 class="card-title"><?= $news['title'] ?></h5>
            <p class="card-text"><?= htmlspecialchars_decode($news['content']) ?></p>

            <div class="d-inline-block margin">
                <?php $icon = '<i class="glyphicon glyphicon-glyphicon glyphicon-heart' . $like . '"></i>'; ?>
                <?= Like::widget([
                    'entity' => 'itemLike',
                    'model' => $news,

                    'buttonOptions' => [
                        'icon' => $icon,
                        'id' => 'like-id',
                        'class' => ' btn background-for-like',
                        'label' => Yii::t('app', 'Мне нравится'),
                    ]
                ]); ?>
            </div>

            <hr>
            <p class="card-text">
                <small class="text-muted">от <?php echo date("d.m.Y h:s:m", $news['date']) ?></small>
            </p>
        </div>
    </div>
</div>


<div class="row">
  <div class="col-12">
    <div><h4>Комментарии:</h4></div>

    <?php echo LbrComments::widget([
      'model' => 'news',
        'model_key' => $news['id'],
        'name_widget' => 'Комментарии:',
    ]) ?>
    
  </div>
</div>