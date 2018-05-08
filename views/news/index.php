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
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}'
                        ],
                        [
                            'label' => 'Заголовок новости',
                            'value' => function ($data) {
                                return strip_tags($data->title);
                            },
                            'format' => 'raw'
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
