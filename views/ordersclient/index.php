<?php

/* @var $this yii\web\View */
use yii\helpers\html;
use yii\widgets\Pjax;

$this->title = 'Заказ покупателя';
$this->params['breadcrumbs'][] = ['label' => 'Все заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title . ": " . $client[0]['ПолноеНаименование'];
//echo "<pre>".print_r($users, true)."</pre>";

?>

<div class="row">
	
    <div class="col-md-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-xs-12">
                	Контрагент: <span class="m-t-0 header-title" style="color: black"><?=$client[0]['ПолноеНаименование']?></span> <br>
                	УНН: <?=$client[0]['УНН']?> <br>
                	Код контрагента: <?=$client[0]['Code']?> <br>
                	Холдинг: Да
                	<?php // echo var_dump($allorders); ?>
                
                   <?php //echo var_dump($data) ?>
                </div>
            </div>
        </div>
    </div>
	
    
     <div class="col-xl-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-xl-3 col-xs-12 left_menu_orders" style="border-right:1px solid #ededed;padding: 0px 0px 0px 5px;">
                    <?php 
                        $spares = $allorders[1];
                        $tehnika = $allorders[0];
                     ?>
                    <?php if ($spares): ?>
                        <h7>Запчасти</h7>
                        <?php foreach ($spares as $order): ?>
                            <div>
                                <a class="dropdown-item notify-item orders_left" onclick = "ajax('tab','ref=<?=$order["Ref_Key"]?>')"><?=$order['Number']?>
                                <span style="font-size: 10px;display: block;">от
                                <?=$odata->convertDate($order['Date'])?></span>
                                </a>
                            </div>
                        <?php endforeach ?>
                        <br>
                    <?php endif ?>
                    
                	<?php if (isset($tehnika)): ?>
                        <h7>Техника</h7>
                        <?php foreach ($tehnika as $order): ?>
                            <div>
                                <a  class="dropdown-item notify-item orders_left" onclick = "ajax('tab','ref=<?=$order["Ref_Key"]?>')" ><?=$order['Number']?>
                                <span style="font-size: 10px;display: block;">от
                                <?=$odata->convertDate($order['Date'])?></span>
                                </a>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                	
                </div>
               
                <div id="ajax-container" class="col-xl-8 col-xs-12 container-fluid mainorders">
                    <div class="text-danger" style="text-align: center;">
                        <h2><i class="dripicons-warning"></i></h2>  Выберите активный заказ слева
                    </div>
                </div>               

    
    </div>

</div>

<!-- <div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-12">
        <div class="card-box">
            <b style="color: red">* для тестирования </b><?php echo $stop ?> <a href="<?=$odata->link?>" target = blank>ссылка</a> <br>
                <?php if ($debug): ?>

                    Всего: <?=count($debug) ?> <br>
                    <pre>
                        <?php echo var_dump($allorders) ?>
                        <?php echo var_dump($debug ); ?>
                    </pre>
                <?php endif ?>
            </div>
        </div>
</div> -->


<script>
        $(document).ready(function() {
            $(".orders_left").click(function() {
                $(".orders_left_active").removeClass("orders_left_active");
                $(this).addClass("orders_left_active");
            });
        });
    </script>