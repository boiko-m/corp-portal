<?php
    use app\models\Profile;
    use app\models\ProjectNews;
    use app\models\Session;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use \app\widgets\Questionnaire;
    use yii\grid\GridView;
    use yii\data\ArrayDataProvider;
    use yii\widgets\Pjax;

    $this->title = 'Мои клиенты';

    $name = Yii::$app->request->getQueryParam('name', '');
    $searchModel = ['Наименование' => $name];



    


?>


<?php Pjax::begin(['enablePushState' => false]); ?>
  <div class="row">
    <div class="col-12 card-box">
      <?php //var_dump($clients) ?>
      <?php $name = Yii::$app->request->getQueryParam('name', ''); ?>
      <?= GridView::widget([
          'dataProvider' => $clients,
          'filterModel' => $searchModel,
          'columns' => [
              //['class' => 'yii\grid\SerialColumn'],
              [
                'attribute' => 'Наименование',
                'format' => 'raw',
                'label' => 'Наименование',
                'filter' => '<input class="form-control" name="name" value="'. $searchModel['Наименование'] .'" type="text" autocomplete = "off">',
                'value' => function($data){
                    return Html::a(
                        $data['Наименование'],
                        '/client/plan/?code='.base64_encode($data['Код']),
                        [
                            'target' => '_blank'
                        ]
                    );
                }

              ],

              [
                'attribute' => 'Код',
                'format' => 'text',
                'label' => 'Код',
              ],


              [
                'attribute' => 'ИНН',
                'format' => 'text',
                'label' => 'ИНН',
              ],

              [
                'attribute' => 'ТипКонтрагента',
                'format' => 'text',
                'label' => 'ТипКонтрагента',
              ], 

              //['class' => 'yii\grid\ActionColumn'],


          ],
          'pager' => [
                  'options'=>['class' => 'pagination float-right'],
                  'linkOptions' => ['class' => 'page-link'],
                  'hideOnSinglePage' => true,
                  'disabledPageCssClass' => 'page-link'
              ],
          'options' => [
            'class' => 'table table-striped table-bordered table-responsive'
          ]
      ]); ?>
    </div>
  </div>
<?php Pjax::end(); ?>