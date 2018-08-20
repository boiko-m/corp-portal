<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = "Категория: " . $model->name;
    $this->params['breadcrumbs'][] = $model->name;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'options'=>['class'=>'table table-striped'],
                    'columns' => [
                        [
                            'label' => 'Заголовок новости',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a(strip_tags($model->title), '/news/' . $model->id, [
                                    'title' => 'Перейти к просмотру',
                                ]);
                            },
                        ],
                        [
                            'attribute' => 'date',
                            'format' => ['date', 'php:d.m.Y'],
                            'headerOptions' => ['style' => 'width:20%'],
                        ],
                    ],
                    'pager' => [
                        'options'=>['class' => 'pagination float-right'],
                        'linkOptions' => ['class' => 'page-link'],
                        'hideOnSinglePage' => true,
                        'disabledPageCssClass' => 'page-link'
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
