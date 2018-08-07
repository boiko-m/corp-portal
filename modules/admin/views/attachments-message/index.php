<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Вложения сообщений';
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-attachments-message {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="attachments-message-index">

    <h1 class="title-attachments-message"><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать вложение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            'id',
            [
                'attribute' => 'date',
                'format' => ['date', 'php:d.m.Y'],
                'headerOptions' => ['style' => 'width:8%'],
            ],
            'name',
            'link',
            'type',
            'id_message',

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
