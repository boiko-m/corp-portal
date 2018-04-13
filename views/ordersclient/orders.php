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
            <?php foreach ($allorders as $client): ?>
            <a href="/ordersclient/?client=<?=$client['Контрагент']['Code']?>"><?=$client['Контрагент']['Description']?></a> от <?=$client['Date']?><br>
        <?php endforeach ?>
        </div>
    </div>
</div>

<div class="row">
     <div class="col-xs-12 col-xl-12">
        <pre><?php echo var_dump($allorders) ?>
        </pre>
     </div>
</div>