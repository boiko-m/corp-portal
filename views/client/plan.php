<?php

    use app\models\Session;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = 'План работ';



    $this->params['breadcrumbs'][] = ['label' => 'Мои клиенты', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    $color = array('#E70000', '#FF8C00', '#FFEF00', '#00811F', '#0044FF', '#760089');
?>
  
  <style>
  #carouselExampleControls::-webkit-scrollbar {
      width: 6px;
    }

    /* Track */
    #carouselExampleControls::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px #d4d4d4;
      -webkit-border-radius: 5px;
      border-radius: 5px;
    }

    /* Handle */
    #carouselExampleControls::-webkit-scrollbar-thumb {
      -webkit-border-radius: 5px;
      border-radius: 5px;
      background: #d4d4d4;
    }

    #carouselExampleControls::-webkit-scrollbar-thumb:window-inactive {
      background: #d4d4d4;
    }


    .carouselExampleControls::-webkit-scrollbar {
          height: 7px;
    }

  
    <?php for ($i=0; $i < count($color); $i++) echo ' .task_main > div:nth-child('.($i+1).') > div:nth-child(1) { background: '.$color[$i].'; } .task_main > div:nth-child('.($i+1).') {border-right:1px solid '.$color[$i].'}'  ?>
  </style>
  <div id = "carouselExampleControls" class="row d-flex flex-nowrap task_main " style="overflow: auto">
      <?php foreach ($tasks as $task => $task_acts) { ?>
      <div class="col-3">
        <div class="row">
          <div class="col-12">
            <?=date("d.m.Y",$task)?>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?php foreach ($task_acts as $task_act => $task_user): ?>
              <div class="row">
                <div class="col-12 p-2 text-center" style="background: #d4d4d4;">
                  <?=($task_act) ? $task_act : 'Не определено';?>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <?php foreach ($task_user as $name => $task_to): ?>
                          <div class="col-<?=(count($task_user) > 1) ? 6 : 12;?> p-0">
                            <div class="row">
                              <div class="col-12 p-2 text-center">
                                <?=($name) ? $name : 'Не определен';?>
                              </div>
                            </div>
                            <div class="row ">
                              <div class="col-12 ">
                                <ul class="connectedSortable">
                                  <?php foreach ($task_to as $t): ?>
                                    <li class="ui-state-default"><?=$t['Название']?></li>
                                  <?php endforeach ?>
                                </ul>
                              </div>
                            </div>
                          </div>


                    

                  <?php endforeach ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <?php } ?>

  </div>



  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .connectedSortable {
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    width: 100%;
    padding: 0px;
  }
  .connectedSortable li{
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size:13px;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".connectedSortable" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
  </script>





<?php 

/*




<?php foreach ($tasks as $task => $task_acts) { ?>
  <div style="display: inline-block;vertical-align:top;">
    <div>
      <?=date("d.m.Y",$task)?>
    </div>
    <div>
      <?php foreach ($task_acts as $task_act => $task_user): ?>
        <div>
          <?=($task_act) ? $task_act : 'Не определено';?>
        </div>
        <div>
          <?php foreach ($task_user as $name => $task_to): ?>
            <div class="d-inline-block">
              <?php echo $name ?>
              <div class="tasks">
                <div>
                  <ul class="connectedSortable">
                    <?php foreach ($task_to as $t): ?>
                      <li class="ui-state-default"><?=$t['Название']?></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php endforeach ?>
    </div>

  </div>
  
<?php } ?>



 ?>

<div class="row ">
  <div class="col-xs-12 col-md-9 m-b-30">
  	<div class="row">
  		<div class="col-xs-12 col-md-6">
			<div class="card p-2 mb-3 alert alert-success alert-dismissible fade show">
				К выполнению
			</div>
			<?php foreach ($plans as $plan): ?>
			  <?php if ($plan['ДатаОкончанияПлан'] > time()): ?>
			  	<div class="row mb-2">
				  	<div class="col-12">
				  		<div class="card p-2">
                <div class="row mb-1">

                  <div class="col-8">
                    <b><?=$plan['Этап']?></b>
                  </div>

                  <div class="col-4 text-right" style="font-size:12px; color:#999999">
                    до <?=date('d.m.Y',$plan['ДатаОкончанияПлан'])?>
                  </div>
                </div>

				  			<div class = "row">
                  <div class="col-12 ml-1">
                    <?=$plan['Задача']?> 
                  </div>      
                </div>

                <div class="row">
                  
                  <div class="col-8" style="font-size:12px; color:#999999">
                    Исполнитель: <?=$plan['ИсполнительФИО']?>
                  </div>

                  <div class="col-4 text-right" style="font-size:12px; color:#999999">
                    <?=$plan['НомерЗаказа']?>
                  </div>
                </div>
				  		</div>
				  	</div>
				  </div>
			  <?php endif ?>
			<?php endforeach ?>
  		</div>
  		<div class="col-xs-12 col-md-6">
			<div class="card p-2 mb-3 alert alert-danger alert-dismissible fade show">
				Просроченные
			</div>
			<?php foreach ($plans as $plan): ?>
        <?php if ($plan['ДатаОкончанияПлан'] < time()): ?>
          <div class="row mb-2">
            <div class="col-12">
              <div class="card p-2">
                <div class="row mb-1">
                  <div class="col-8">
                    <b><?=$plan['Этап']?></b>
                  </div>
                  <div class="col-4 text-right" style="font-size:12px; color:#999999">
                    до <?=date('d.m.Y',$plan['ДатаОкончанияПлан'])?>
                  </div>
                </div>

                <div class = "row">
                  <div class="col-12 ml-1">
                    <?=$plan['Задача']?> 
                  </div>      
                </div>

                <div class="row">
                  <div class="col-8" style="font-size:12px; color:#999999">
                    Исполнитель: <?=$plan['ИсполнительФИО']?>
                  </div>
                  <div class="col-4 text-right" style="font-size:12px; color:#999999">
                    <?=$plan['НомерЗаказа']?>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
  		</div>
  	</div>
  </div>

  <div class="col-sx-12 col-md-3">
    <div class="pb-3">
          <a href="/client/">Вернуться к клиентам</a>
        </div>
    <div class="card">
      <div class="card-header">
      	Дополнительно
      </div>
      <div class="card-body">
        
      	<div>
          <button type="button" class="btn btn-light waves-effect w-100">Обновить план</button> 
        </div>
        
      </div>
    </div>
  </div>

</div>
