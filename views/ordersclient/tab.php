
                    
                    	<ul class="nav nav-tabs tabs-bordered nav-justified  ">
	                        <li class="nav-item col-xs-12">
	                            <a href="#stage" class="nav-link active" data-toggle = "tab" aria-expanded = "false">Этапы по заказу </a>
	                        </li>
	                        <li class="nav-item col-xs-12">
	                            <a href="#specifications" onclick = "ajax('specifications', 'ref=<?=$order['Ref_Key']?>','specifications')" class="nav-link" data-toggle = "tab" aria-expanded = "false">Спецификации</a>
	                        </li>
	                        <!-- <li class="nav-item col-xs-12">
                                <a href="#forecast" class="nav-link" data-toggle = "tab" aria-expanded = "false">Прогноз по товару</a>
                            </li> -->
	                        <li class="nav-item col-xs-12">
	                            <a href="#messages" onclick = "ajax('messages', 'ref=<?=$order['Ref_Key']?>','messages')" class="nav-link"  data-toggle = "tab" aria-expanded = "false">Сообщения <span style="background: #4f5a6e;padding: 2px 7px;color: white;border-radius: 5px;"><?=$allmessages?></span></a>
	                        </li>
	                    </ul>
                    

                   

                    <div class="tab-content">
                        <div class="tab-pane active show" id="stage">
                            <?=$this->render("tabs/stage", array("bussiness" => $bussiness, 'stage' => $order['ЭтапыСделки'], 'odata' => $odata)); ?>
                        </div>

                        <div class="tab-pane  show" id="specifications">
                            
                        </div>

                        <div class="tab-pane show" id="forecast">
                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                        </div>

                        <div class="tab-pane show" id="messages">
                            
                        </div>

                    </div>

