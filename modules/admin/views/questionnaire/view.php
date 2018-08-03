<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\grid\GridView;
    use scotthuangzl\googlechart\GoogleChart;
    use app\models\AnswersUser;

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
          'value' => function($model) {
            return date('d.m.Y', $model->create_at);
          },
        ],
        [
          'attribute' => 'create_user',
          'value' => function($model) {
            $profile = app\models\Profile::findOne($model->create_user);
            return $profile->name . "($model->create_user)";
          },
        ],
      ],
    ]) ?>

    <?php
      $arrayChart = array(array('Вариант', 'Количество'));
      foreach ($answers as $key => $answer) {
        array_push($arrayChart, array($answer->name, intval(AnswersUser::find()->where(['id_answer' => $answer->id])->count())));
      }
    ?>

  <div class="row">
    <div class="col-md-12" style="margin-top: 25px;">
      <?php echo GoogleChart::widget(array('visualization' => 'ColumnChart',
          'data' => $arrayChart,
          'options' => array(
            'title' => 'Общее количество голосов', 
            'titleTextStyle' => array('color' => '#000'),
            'legend' => array('position' => 'right'),
          )
      )); ?>
    </div>
    <div class="col-md-6" style="margin-top: 40px">
      <?php echo GoogleChart::widget(array('visualization' => 'PieChart',
        'data' => $arrayChart,
        'options' => array(
          'title' => 'Общее количество голосов',
          'height' => 500,
        )
      )); ?>
    </div>
    <div class="col-md-6" style="margin-top: 40px">
      <?php echo GoogleChart::widget(array('visualization' => 'PieChart',
        'data' => $arrayChart,
        'options' => array(
          'title' => 'Общее количество голосов',
          'height' => 500,
          'pieSliceText' => 'label',
          'pieStartAngle' => 100,
        )
      )); ?>
    </div>

  </div>

  <div style="margin-top: 40px; background-color: #FFFFFF; padding: 10px 20px;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          [
            'attribute' => 'id',
            'headerOptions' => ['style' => 'width:5%'],
          ],
          [
            'attribute' => 'id_user',
            'value' => 'profile.name',
            'headerOptions' => ['style' => 'width:25%'],
          ],
          [
            'attribute' => 'id_answer',
            'value' => 'answer.name'
          ],
          [
            'attribute' => 'date',
            'value' => function($model) {
              return date('d.m.Y', $model->date);
            },
            'headerOptions' => ['style' => 'width:13%'],
          ],
        ],
      ]); ?>
    </div>

</div>
