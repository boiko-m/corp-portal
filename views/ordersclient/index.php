<?php

/* @var $this yii\web\View */

$this->title = 'Заказ покупателя';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>".print_r($users, true)."</pre>";
?>

<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-6 col-xl-12">
		<div class="card-box">
			<b style="color: red">* для тестирования </b><?php echo $stop ?> <a href="<?=$odata->link?>" target = blank>ссылка</a>
		</div>
	</div>
    <div class="col-md-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                	Клиент: <?=$client[0]['ПолноеНаименование']?> <br>
                	УНН: <?=$client[0]['УНН']?> <br>
                	Код контрагента: <?=$client[0]['ИБ'].$client[0]['Code']?> <br>
                	Холдинг: Да
                	<?php // echo var_dump($allorders); ?>
                
                   <?php //echo var_dump($data) ?>
                </div>
            </div>
        </div>
    </div>
	

	<div class="row">
		<div class="col-xl-12 container-fluid">

		</div>
	</div>

     <div class="col-xl-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-xl-12 left_menu_orders">
                	<h6>Заказы по запчастям</h6>
                	<?php foreach ($allorders as $order): ?>
                		<?php if ($order['ДелениеПоТипуТовара'] == "ДляЗапчастей"): ?>
                			<div>
		                		<a href=""><?=$order['Number']?> : <span style="color: red"><?=$order['Статус']?></span></a><br> от
		                		<?=$odata->convertDate($order['Date'])?>
		                	</div>
                		<?php endif ?>
                	<?php endforeach ?>

                	<h6>Заказы по технике</h6>
                	<?php foreach ($allorders as $order): ?>
                		<?php if ($order['ДелениеПоТипуТовара'] == ""): ?>
                			<div>
		                		<a href=""><?=$order['Number']?> : <span style="color: red"><?=$order['Статус']?></span></a><br> от
		                		<?=$odata->convertDate($order['Date'])?>
		                	</div>
                		<?php endif ?>
                	<?php endforeach ?>
                	
                </div>
                <div class="col-xl-9">
                    <ul class="nav nav-tabs tabs-bordered nav-justified">
                        <li class="nav-item">
                            <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Спецификация
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Прогноз по товару
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Сообщения
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home-b2">
                            <table class="table table-bordered table-responsive" style="text-align: center;">
	                           <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Товар</th>
	                                <th>Кол-во</th>
	                                <th>Цена</th>
	                                <th>Скидка</th>
	                                <th>Цена продажи</th>
	                                <th>Доход</th>
	                                <th>Рент. %</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                            <?php $items = $allorders[1]['Основная']; ?>
	                            <?php foreach ($items as $item): $i++?>
	                            	<?php  $product = $odata->getOne("Catalog_Товары", $item['Товар_Key']); ?>
	                            	<tr>
		                                <th scope="row"><?=$i?></th>
		                                <td><?=$product['Description'] ?><</td>
		                                <td><?=$item['Количество'] ?></td>
		                                <td><?=$item['Цена'] ?></td>
		                                <td><?=$item['Скидка'] ?></td>
		                                <td><?=$item['ЦенаПродажи'] ?></td>
		                                <td>-</td>
		                                <td>-</td>

		                            </tr>	          	
	                            <?php endforeach;$i=null; ?>                            
	                            </tbody>
	                        </table>
                        </div>

                        <div class="tab-pane" id="profile-b2">
                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                        </div>
                        <div class="tab-pane" id="messages-b2">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
