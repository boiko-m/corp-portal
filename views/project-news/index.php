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
                  <?php $visit = \Yii::$app->visit->get([
                      'controller' => 'project-news',
                      'action' => 'view',
                      'id' => $new->id,
                      'save' => false,
                      'one' => true
                  ]); ?>
                  <div class="row each-hr">
                    <div class="col-12">
                      <?= Html::a(
                        $new->title,
                        Url::to(['project-news/view', 'id' => $new->id]),
                        ['class' => $visit ? 'visited' : ''])
                      ?>
                      <span class="news_date"><?=date('d.m.y', $new->create_at)?></span>
                    </div>
                    <div class="col-12 news_meta">
                      <span><?= $new->short_description ?></span>
                    </div>
                    <div class="col-12 news_proj tabs news mt-2">

                      <i class="fa fa-share-alt news-title"></i>
                      <?= Html::a(
                        $new->project->name,
                        Url::to(['/project/info/', 'id' => $new->project->id]),
                        ['class' => ''])
                      ?>
                    </div>
                  </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
