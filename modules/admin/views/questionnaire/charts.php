<?php
  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use yii\grid\GridView;
  use yii\helpers\ArrayHelper;
  use app\models\AnswersUser;
  use scotthuangzl\googlechart\GoogleChart;

  $this->title = $model->name;
  $this->params['breadcrumbs'][] = ['label' => 'Опросы', 'url' => ['index']];
  $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
  $this->params['breadcrumbs'][] = 'Статистика';
?>

<!-- <style>
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
</style> -->

<div class="questionnaire-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

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

  <div class="card" style="margin-top: 40px; background-color: #FFFFFF; padding: 10px 20px;">
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
            // 'value' => function($model) {
            //   $answers = app\models\Answers::find()->where(['id_question' => $model->id_question])->all();
            //   return Html::dropDownList('id_answer', $model->id_answer, ArrayHelper::map($answers, 'id', 'name'), ['class' => 'view_answer_dropdown']);
            // },
            'value' => 'answer.name',
          ],
          [
            'attribute' => 'date',
            'format' => ['date', 'php:d.m.Y'],
            'headerOptions' => ['style' => 'width:8%'],
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
