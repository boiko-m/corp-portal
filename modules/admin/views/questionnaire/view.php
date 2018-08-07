<?php
  use yii\helpers\Html;
  use yii\widgets\DetailView;

  $this->title = $model->name;
  $this->params['breadcrumbs'][] = ['label' => 'Опросы', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
?>

<div class="questionnaire-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить опрос?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
      'model' => $model,
      'attributes' => [
        'id',
        'name',
        'description:ntext',
        [
          'attribute' => 'type',
          'value' => function($model) {
            $model->type ? $ret = 'Да' : $ret = 'Нет';
            return $ret;
          },
        ],
        [
          'attribute' => 'create_at',
          'format' => ['date', 'php:d.m.Y'],
          'headerOptions' => ['style' => 'width:8%'],
        ],
        [
          'attribute' => 'create_user',
          'value' => function($model) {
            $profile = app\models\Profile::findOne($model->create_user);
            return $profile->name . " ($model->create_user)";
          },
        ],
      ],
    ]) ?>

</div>
