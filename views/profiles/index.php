<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\Alphabet;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;

echo Html::jsFile('@web/js/ajax.js');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">
                <div class="preloader"></div>
                <?php Pjax::begin(['timeout' => 20000]); ?>
            <?php
            if(!Yii::$app->request->get('param') == 'new'){
               echo  Alphabet::widget([
                    'options' => ['class' => 'alphabet-wrap',
                        ],
                    'letters' => $alphabet,
                    'actionLink' => 'profiles/index',
                ]);
            }
            else{
                $searchModel = null;
            }
            ?>
                 <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "",

                    'options'=>['class'=>'table table-striped',],
                    'columns' => [
                       /* [

                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                        ],*/
                        [
                            'attribute' => 'grid',
                            'value' =>   function (\app\models\Profile $data) {
                                $link = "<a href=/profiles/".$data->id.'>'.$data->getName().'</a><br>';
                                $link = $link.$data->getGrid();
                                return $link;
                            },
                            'format' => 'raw',

                        ],
                        'branch',
                        [
                            'attribute' => 'department_position',
                            'value' =>   function (\app\models\Profile $data) {
                                $link =$data->department.'<br>'.$data->position;

                                return $link;
                            },
                            'format' => 'raw',

                        ],
                        [
                            'attribute' => 'phone',
                            'value' =>   function (\app\models\Profile $data) {
                                $onePhone = explode(",", $data->phone);
                                $link =  $data->sip ? 'SIP '.$data->sip.'<br>': "&nbsp;";
                                $link =$link. "<a href=tel:".$onePhone[0].'>'.$onePhone[0].'</a><br>';
                                $link = $link.' '."<a href=tel:".$onePhone[1].'>'.$onePhone[1].'</a>';


                                return $link;
                            },
                            'format' => 'raw',

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
