<?php

    use app\models\Session;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = 'План работ';



    $this->params['breadcrumbs'][] = ['label' => 'Мои клиенты', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

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

<div class="row">
  <div class="col-12">
    <div class="card-box">
      <?php foreach ($plans as $plan): ?>
      	 <?php echo "<pre>".print_r($plan, true)."</pre>"; ?>
      <?php endforeach ?>
    </div>
  </div>
</div>