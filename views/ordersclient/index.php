<?php

/* @var $this yii\web\View */
use yii\helpers\html;
use yii\widgets\Pjax;

$this->title = 'Заказ покупателя';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>".print_r($users, true)."</pre>";
?>

<div class="row">
	
    <div class="col-md-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                	Контрагент: <span class="m-t-0 header-title" style="color: black"><?=$client[0]['ПолноеНаименование']?></span> <br>
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
                <div class="col-xl-3 col-xs-12 left_menu_orders">
                	<h6>Заказы по запчастям</h6>
                	<?php foreach ($allorders as $order): ?>
                		<?php if ($order['ДелениеПоТипуТовара'] == "ДляЗапчастей"): ?>
                			<div>
		                		<a href="" class="dropdown-item notify-item" style="margin: 0px;border-top: 1px solid #e7e7e7;color:black;font-weight: bold"><?=$order['Number']?> : <span style="color: red"><?=$order['Статус']?></span> <br>
                                <span style="font-size: 10px;">от
                                <?=$odata->convertDate($order['Date'])?></span>
                                </a>
		                	</div>
                		<?php endif ?>
                	<?php endforeach ?>
                    <br>
                	<h6>Заказы по технике</h6>
                	<?php foreach ($allorders as $order): ?>
                		<?php if ($order['ДелениеПоТипуТовара'] == ""): ?>
                			<div>
                                <a href="" class="dropdown-item notify-item" style="margin: 0px;border-top: 1px solid #e7e7e7;color:black;font-weight: bold"><?=$order['Number']?> : <span style="color: red"><?=$order['Статус']?></span> <br>
                                <span style="font-size: 10px;">от
                                <?=$odata->convertDate($order['Date'])?></span>
                                </a>
                            </div>
                		<?php endif ?>
                	<?php endforeach ?>
                	
                </div>

                             

                <div class="col-xl-8 col-xs-12 container-fluid">
                    <ul class="nav nav-tabs tabs-bordered nav-justified col-xs-6 container-fluid">
                        <li class="nav-item col-xs-12">
                            <a href="#stage" class="nav-link active" data-toggle = "tab" aria-expanded = "false">Этапы по заказу </a>
                        </li>
                        <li class="nav-item col-xs-12">
                            <a href="#specifications" class="nav-link" data-toggle = "tab" aria-expanded = "false">Спецификации</a>
                        </li>
                        <li class="nav-item col-xs-12">
                            <a href="#forecast" class="nav-link" data-toggle = "tab" aria-expanded = "false">Прогноз по товару</a>
                        </li>
                        <li class="nav-item col-xs-12">
                            <a href="#messages" class="nav-link" data-toggle = "tab" aria-expanded = "false">Сообщения</a>
                        </li>
                    </ul>

                   

                    <div class="tab-content ">

                        <div class="tab-pane active" id="stage">
                            
                            <div class="timeline">
                                        <article class="timeline-item alt">
                                            <div class="text-right">
                                                <div class="time-show first">
                                                    <a href="#" class="btn btn-gradient w-lg">Сегодня</a>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item alt">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow-alt"></span>
                                                        <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="">10.04.2018</h4>
                                                        <p>Получить аванс </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item ">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon bg-success"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-success">05.04.2018</h4>
                                                        <p>Договор отправлен, подписать </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item alt">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow-alt"></span>
                                                        <span class="timeline-icon bg-primary"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-primary">10 hours ago</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>3 new photo Uploaded on facebook fan page</p>
                                                        <div class="album">
                                                            <a href="#">
                                                                <img alt="" src="assets/images/small/img-1.jpg">
                                                            </a>
                                                            <a href="#">
                                                                <img alt="" src="assets/images/small/img-2.jpg">
                                                            </a>
                                                            <a href="#">
                                                                <img alt="" src="assets/images/small/img-3.jpg">
                                                            </a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon bg-purple"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-purple">14 hours ago</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Outdoor visit at California State Route 85 with John Boltana &amp;
                                                            Harry Piterson regarding to setup a new show room.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item alt">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow-alt"></span>
                                                        <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-muted">19 hours ago</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span>
                                                            Lorem ipsum dolor sit amet consiquest dio</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="timeline-item alt">
                                            <div class="text-right">
                                                <div class="time-show">
                                                    <a href="#" class="btn btn-gradient w-lg">Yesterday</a>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon bg-warning"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-warning">07 January 2016</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Montly Regular Medical check up at Greenland Hospital by the
                                                            doctor <span><a href="#"> Johm meon </a></span>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item alt">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow-alt"></span>
                                                        <span class="timeline-icon bg-primary"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-primary">07 January 2016</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Download the new updates of Ubold admin dashboard</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="timeline-item">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon bg-success"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-success">07 January 2016</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Jonatha Smith added new milestone <span><a class="blue" href="#">crishtian</a></span>
                                                            Lorem ipsum dolor sit amet consiquest dio</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="timeline-item alt">
                                            <div class="text-right">
                                                <div class="time-show">
                                                    <a href="#" class="btn btn-gradient w-lg">Last Month</a>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="timeline-item alt">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow-alt"></span>
                                                        <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-muted">31 December 2015</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Download the new updates of Ubold admin dashboard</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="timeline-item">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="timeline-box">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon bg-danger"><i class="mdi mdi-adjust"></i></span>
                                                        <h4 class="text-danger">16 Decembar 2015</h4>
                                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                        <p>Jonatha Smith added new milestone <span><a href="#">prank</a></span>
                                                            Lorem ipsum dolor sit amet consiquest dio</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                    </div>

                        </div>

                        <div class="tab-pane " id="specifications">
                            <table class="table table-bordered table-responsive col-xs-12" style="text-align: center;">
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

                        <div class="tab-pane" id="forecast">
                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                        </div>

                        <div class="tab-pane" id="messages">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                        </div>

                    </div>
                </div>

                <?php Pjax::begin(["timeout" => 0, "enablePushState" => true]); ?>   
                <?php Pjax::end(); ?>


            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-12">
        <div class="card-box">
            <b style="color: red">* для тестирования </b><?php echo $stop ?> <a href="<?=$odata->link?>" target = blank>ссылка</a>
        </div>
    </div>
    




</div>
