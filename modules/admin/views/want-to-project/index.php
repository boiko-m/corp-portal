<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Желающие принять участие';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="want-to-project-index">
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:7%'],
            ],
            [
                'attribute' => 'id_user',
                'value' => 'profile.name',
            ],
            [
                'attribute' => 'id_project',
                'value' => 'project.name',
            ],
            [
                'attribute' => 'complete',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:9%'],
            ],
            [
                'attribute' => 'decision',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:8%'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
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
