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
                    //'filterModel' => $searchModel,
                    'summary' => "",
                    'options'=>['class'=>'table table-striped'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}'
                        ],
                        [
                            'label' => 'Заголовок новости',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return strip_tags($data->title);
                            },
                        ],
                        [
                            'attribute' => 'date',
                            'format' => ['date', 'php:d.m.Y'],
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
