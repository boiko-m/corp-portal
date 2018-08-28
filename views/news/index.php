<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'summary' => "",
                    'options'=>['class'=>'table table-striped'],
                    'columns' => [
                        [
                            'label' => 'Заголовок новости',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a(strip_tags($model->title), '/news/' . $model->id, [
                                    'title' => 'Перейти к просмотру',
                                ]);
                            },
                        ],
                        [
                            'attribute' => 'newsCategory.name',
                            'label' => 'Категория',
                        ],
                        [
                            'attribute' => 'date',
                            'label' => 'Дата публикации',
                            'format' => ['date', 'php:d.m.Y'],
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
    </div>
</div>
