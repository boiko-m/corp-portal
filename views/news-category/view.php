<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;

    $this->title = "Категория: " . $category->name;
    $this->params['breadcrumbs'][] = $category->name;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="container-fluid news">

              <?php foreach ($news as $new) { ?>
                <?php $visit = \Yii::$app->visit->get([
                    'controller' => 'news',
                    'action' => 'view',
                    'id' => $new->id,
                    'save' => false,
                    'one' => true
                ]); ?>
                <div class="row each-hr">
                  <div class="col-12">
                    <?= Html::a(
                      $new->title,
                      Url::to(['news/view', 'id' => $new->id]),
                      ['class' => $visit ? 'visited' : ''])
                    ?>
                    <span class="news_date"><?=date('d.m.y', $new->date)?></span>
                  </div>
                  <?php if ($new->newsCategory) : ?>
                    <div class="col-12 news_proj tabs news mt-2">
                      <i class="fa <?= $new->newsCategory->pintogram ?> news-title"></i>
                      <?= Html::a(
                        $new->newsCategory->name,
                        Url::to( $new->newsCategory->id === 3 ? ['project/index'] : ['news-category/view', 'id' => $new->newsCategory->id]),
                        ['class' => ''])
                      ?>
                    </div>
                  <? endif; ?>
                </div>
              <?php } ?>

            </div>
        </div>
    </div>
</div>
