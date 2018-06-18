<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\Alphabet;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">
            <h3>Поиск по "<?=$search?>"</h3>
            <div class="for-search">
                <?php  $model = new \app\models\ProfileMain;
                $form = ActiveForm::begin([
                    'method'=> 'get',
                    'action' => ['/search/view'],
                ]);
                ?>

                <!-- <input type="text" placeholder="Поиск..." class="form-control">-->
                <?= $form->field($model, 'text')->textInput( [
                    'placeholder' => 'Поиск...',
                    'class' => 'form-control',
                    'id' => 'full-search',
                    'autocomplete'=>'off',
                    'value'=>$search,
                ])->label(false); ?>

                <?/*= Html::input('text','MainForm','', ['class' => 'form-control hidden-xs',
                            'placeholder' => 'Поиск..', 'novalidate' => 'novalidate',
                        ])*/ ?>

<div class="full-search">
    <?= Html::submitButton('<span class="fa fa-search"></span>', ['class' => 'button-search']) ?>
</div>


                <?php $form = ActiveForm::end(); ?>

            </div>
            <?php foreach ($models as $value) {
                $branch = $value['branch'] . ', ' . $value['department'];
                $name = $value['first_name'] . ' ' . $value['last_name'];
                ?>


                <div class="all">


                    <div id="one">
                        <?= \yii\helpers\Html::a(\yii\helpers\Html::img($value->getImage(),
                            ['alt' => '', 'align' => "center", 'class' => "center-img", 'style' => 'width: 76px;border-radius: 5px;  ']), '/profiles/' . $value['id']); ?></div>


                    <div id="two" style="padding: -5px 0 0 0">
        <span>
                       <?= \yii\helpers\Html::a($name, '/profiles/' . $value['id']) ?>
                    </span>


                        <br>

                        <span title="<?= $value['position'] ?>" class="branch">
                        <?php
                        echo mb_strimwidth($value['position'], 0, 45, '...');
                        ?>
                    </span>

                        <br>

                        <?php if (($value['user']['email']) != '') {
                            ?>
                            <span>
                        <?= $value['user']['email']; ?>
                    </span>
                            <br>
                        <?php }
                        ?>

                        <span title="<?= $branch ?>" class="branch">
                        <?php
                        echo mb_strimwidth($branch, 0, 65, '...');
                        ?>
                    </span>
                    </div>

                    <div id="three" align="center" style="padding: 10px 0 0 0">
                        <?php if (!empty($value['cabinet'])) { ?>
                            <span title="№ кабинета" style="padding:  0 0 0 5px" >
                Кабинет №
                                <?=' ' . $value['cabinet']; ?>
            </span>
                            <br>
                        <?php } ?>
                        <?php if (!empty($value['phone_cabinet']) && $value['phone_cabinet'] != '-') { ?>
                            <span title="Рабочий телефон" >
                Рабочий телефон
                                <?=' ' . $value['phone_cabinet']; ?>
            </span>
                        <?php } ?>
                    </div>

                    <div id="four" align="left" style="padding: 10px 0 0 0">    <?php
                        $onePhone = explode(",", $value['phone']);
                        echo "<a href=tel:" . $onePhone[0] . '>' . $onePhone[0] . '</a><br>';
                        echo "<a href=tel:" . $onePhone[1] . '>' . $onePhone[1] . '</a><br>';
                        ?>

                    </div>

                    <div id="five" style="padding: 10px 0 0 0">
                        <?php if ($value['skype'] != ''){ ?>
                            <a href="skype:<?= $value['skype']; ?>?add"><i class="fa fa-skype"></i></a>

                        <?php } ?>
                    </div>
                </div>

                <hr>
            <?php }?>
            <?php
            echo LinkPager::widget([
                'pagination' => $pages,
                    'options'=>['class' => 'pagination float-right'],
                    'linkOptions' => ['class' => 'page-link'],

                    'disabledPageCssClass' => 'page-link'
            ]);
            ?>
            </div></div></div></div>


