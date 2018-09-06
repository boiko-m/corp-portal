<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use yii\helpers\Url;

    $this->title = 'Новости проектов';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="container-fluid">

                <?php foreach ($news as $new) { ?>
                  <div class="row each-hr">
                    <div class="col-12">
                      <?= Html::a(
                        $new->title,
                        Url::to(['/project-news/' . $new->id]),
                        ['class' => ''])
                      ?>
                    </div>
                    <div class="col-12 news_meta">
                      <span class="news_date"><?=date('d.m.y в H:m', $new->create_at)?></span>
                      <?= $new->short_description ?></div>
                    <div class="col-12 news_proj tabs news mt-1">
                      <i class="fa fa-share-alt news-title"></i>
                      <?= Html::a(
                        $new->project->name,
                        Url::to(['/project/info/' . $new->project->id]),
                        ['class' => ''])
                      ?>
                    </div>
                  </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
