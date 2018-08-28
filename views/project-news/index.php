<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Новости проектов';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">

                <!-- <h1><?= Html::encode($this->title) ?></h1> -->
                <?php Pjax::begin(); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'options'=>['class'=>'table table-striped'],
                    'columns' => [
                        [
                            'label' => 'Заголовок новости',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a(strip_tags($model->title), '/project-news/' . $model->id, [
                                    'title' => 'Перейти к просмотру',
                                ]);
                            },
                        ],
                        [
                            'label' => 'Проект',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a(strip_tags($model['project']['name']), '/project/info/' . $model->id_project, [
                                    'title' => 'Перейти к просмотру',
                                ]);
                            },
                            'headerOptions' => ['style' => 'width:50%'],
                        ],
                    ],
                    'pager' => [
                        'options'=>['class' => 'pagination float-right'],
                        'linkOptions' => ['class' => 'page-link'],
                        'hideOnSinglePage' => true,
                        'disabledPageCssClass' => 'page-link'
                    ],
                ]); ?>
                <?php Pjax::end(); ?>

            </div>
        </div>
    </div>
</div>