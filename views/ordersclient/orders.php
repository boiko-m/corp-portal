<?php

/* @var $this yii\web\View */
use yii\helpers\html;
use yii\widgets\Pjax;

$this->title = 'Заказ покупателя';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>".print_r($users, true)."</pre>";

?>
<div class="row">
    <div class="col-xs-12 col-xl-12">
        <div class="card-box">
            <h5>Мои заказы в активной работе:</h5>
            <?if(!empty($allorders)):?>
                <?php foreach ($allorders as $client): ?>
                    <a href="/ordersclient/?client=<?=$client['Контрагент']['Code']?>" style = "padding-left: 15px"><?=$client['Контрагент']['Description']?></a> от <?=$client['Date']?><br>
                <?php endforeach ?>
            <?else:?>
                Список заказов пуст.
            <?endif;?>
        </div>
    </div>
</div>
<!--
<div class="row">
     <div class="col-xs-12 col-xl-12">
        <pre><?php echo var_dump($allorders) ?>
        </pre>
     </div>
</div> -->
