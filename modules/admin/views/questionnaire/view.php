<?php
  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use yii\grid\GridView;
  use yii\helpers\ArrayHelper;
  use app\models\AnswersUser;
  use scotthuangzl\googlechart\GoogleChart;

  $this->title = $model->name;
  $this->params['breadcrumbs'][] = ['label' => 'Опросы', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
?>

<style>
  .view_answer_dropdown {
    width: 100%;
    padding: 1px 5px 1px 5px;
    display: block;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border: 1px solid #a5a5a5;
  }
</style>

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
        'summary' => '<h6 style="font-weight: bold">Ответы пользователей</h6>',
        'columns' => [
          [
            'attribute' => 'id',
            'headerOptions' => ['style' => 'width:5%'],
          ],
          [
            'attribute' => 'id_user',
            'format' => 'raw',
            'value' => function($model) {
              $profile = app\models\Profile::findOne($model->id_user);
              return Html::a($profile->name, ["/profiles/$model->id_user"]);
            },
            'headerOptions' => ['style' => 'width:25%'],
          ],
          [
            'attribute' => 'id_answer',
            'format' => 'raw',
            'value' => function($model) {
              $answers = app\models\Answers::find()->where(['id_question' => $model->id_question])->all();
              return Html::dropDownList('id_answer', $model->id_answer, ArrayHelper::map($answers, 'id', 'name'), ['class' => 'view_answer_dropdown']);
            },
          ],
          [
            'attribute' => 'date',
            'format' => ['date', 'php:d.m.Y'],
            'headerOptions' => ['style' => 'width:8%'],
          ],
        ],
      ]); ?>
    </div>

</div>
