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

?>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">
                <div class="preloader"></div>
                <?php Pjax::begin(['timeout' => 5000]); ?>
                
                <?= Alphabet::widget([
                    'options' => ['class' => 'alphabet-wrap'],
                    'letters' => $alphabet,
                    'actionLink' => 'profiles/index'
                ]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => "",
                    'options'=>['class'=>'table table-striped'],
                    'columns' => [
                        [
                            'label' => 'ФИО',
                            'value' => function ($data) {
                                return Html::a(sprintf("%s %s %s", $data->last_name, $data->first_name, $data->middle_name), Url::to(['view', 'id' => $data->id]));
                            },
                            'format' => 'raw'
                        ],
                        [
                            'label' => 'SIP',
                            'value' => function ($data) {
                                return $data->sip ? $data->sip : "&nbsp;";
                            },
                            'format' => 'raw'
                        ],
                        'user.email',
                        'branch',
                        'department',
                        'phone1'
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

<script>
    $(document).on('pjax:send', function() {
        $(".preloader").show();
    });
    $(document).on('pjax:complete', function() {
        $(".preloader").hide();
    });
</script>
