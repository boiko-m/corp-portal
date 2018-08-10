<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Категории подарков';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-type-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию подарков', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'visible:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
