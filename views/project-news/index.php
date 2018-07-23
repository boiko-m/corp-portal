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

                <h1><?= Html::encode($this->title) ?></h1>
                <?php Pjax::begin(); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'summary' => "",
                    'options'=>['class'=>'table table-striped'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                            'headerOptions' => ['style' => 'width:1%'],
                        ],
                        [
                            'label' => 'Заголовок новости',
                            'value' => function ($data) {
                                return strip_tags($data->title);
                            },
                            'format' => 'raw',
                            'headerOptions' => ['style' => 'width:50%'],
                        ],
                        [
                            'label' => 'Проект',
                            'value' => function ($data) {
                                return (\app\models\Projects::findOne($data->id_project))->name;
                            },
                            'format' => 'raw',
                            'headerOptions' => ['style' => 'width:49%'],
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