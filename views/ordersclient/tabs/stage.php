 <?php 
$cur_date = strtotime(date("d-m-Y"));
function convertDate($date) { // 18.12.2018 - normal date,  2018-03-18T00:00:00 - not normal date
    $dat = new \DateTime($date);
    if (strpos($date, ".")) {
        $cur_date = $dat->format("Y-m-d".'\T'."H:i:s");
    } else {
        $cur_date = $dat->format("d-m-Y");
    }
    return $cur_date;
}


if ($stage) {
    foreach ($stage as $st) {
        $count_stage++;
        $i++;
        $rand = rand(0, 100);
        $data = $odata->one("Catalog_ЭтапыПрохожденияСделки", $st['Этап_Key'], array(
            'select' => "Description"
        ));
        $array_stage[$i]['Название'] = $data['Description'];
        if ($rand>90) {
            $array_stage[$i]['ТекущийЭтап'] = true;
        } else {
            $array_stage[$i]['ТекущийЭтап'] = $st['ТекущийЭтап'];
        }

        if ($array_stage[$i]['ТекущийЭтап'] ==true) {
            $cur_stage = $i;
        }
    }



    $array_stage[$cur_stage-3]['opacity'] = 0.22;
    $array_stage[$cur_stage-2]['opacity'] = 0.33;
    $array_stage[$cur_stage-1]['opacity'] = 0.66;





    for ($i=1; $i < 10; $i++) { 
        $array_stage[$cur_stage + $i]['opacity'] = 1;
    }

    foreach ($array_stage as $array_s) {
        if ($array_s['opacity'] and $array_s['Название']) {
            $otobrashenie++;
        }
    }

    $end_stage = 0;
    for ($i=1; $i < count($array_stage); $i++) { 
        if ($array_stage[$i]['opacity'] and !$end_stage) {
            $end_stage = 6;
        } 

        if ($end_stage and $array_stage[$i]['opacity']) {
            $array_stage[$i+$end_stage]['opacity'] = 0;
        }

    }
    if (!$cur_stage) {
        $cur_stage=0;
    } else {
        $array_stage[$cur_stage]['cur_stage'] = true;
        $array_stage[$cur_stage + $i]['class'] = "cur_stage";
    }


    foreach ($array_stage as $array_s) {
        if ($array_s['opacity'] and $array_s['Название']) {
            $count_visible++;
        }
    }
    if ($count_visible == 3) {
        $array_stage[$cur_stage-4]['opacity'] = 0.22;
        $array_stage[$cur_stage-5]['opacity'] = 0.22;
    }
    if ($count_visible == 4) {
        $array_stage[$cur_stage-5]['opacity'] = 0.22;
    }

    $procent = $cur_stage/$count_stage*100;
   

} else {
    $etap_error = true;
}




?>


    <?php if (!$etap_error) { ?>
        <div class="row">
            <div class="col-xs-12">
                <h5>Этап заказа</h5>
                <h6>Выполнено <?=round($procent, 0)?>%</h6>
            </div>
        </div>

        <div class="row">
            <div class="hidden-xs col-md-12">
                <div class="progress mb-10">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?=$procent?>%"></div>      
                </div>
            </div>
        </div>

       <style>
           .etap {
                text-align: center;
                background: #f7f7f7;
                border-radius: 5px;
                padding: 10px 0px;
           }
           .cur_stage {
                color: black;
                border-left:1px solid #d7d7d7;
           }
           .etap > div:hover {
                opacity: 1!important;
           }
       </style>

       <div class="row etap">
           <?php foreach ($array_stage as $stage) { ?>
               <?php if ($stage['opacity'] and !$stage['cur_stage']): ?>
                   <div class="col-md-2 col-xs-12 stage_etap" style="opacity: <?=$stage['opacity']?>" >
                       <?=$stage['Название'] ?>
                   </div>
               <?php endif ?>
               <?php if ($stage['cur_stage']): ?>
                   <div class="col-md-2 col-xs-12 cur_stage stage_etap">
                       <?=$stage['Название'] ?> <br>
                       <i class="dripicons-star"></i>
                   </div>
               <?php endif ?>
           <?php } ?>
       </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-xs-12">
                <h5>Этапы заказа не добавлены</h5>
            </div>
        </div>
    <?php } ?>
    
    <!-- <div class="row etap ">
            <div class="hidden-xs col-md-2">
                Подготовка к продаже
            </div>
            <div class="hidden-xs col-md-2">
                Подбор товаров и услуг
            </div>
            <div class="hidden-xs col-md-2">
                Презентация продукта
            </div>
            <div class="col-xs-12 col-md-2">
                Дожим покупателя
            </div>
            <div class="hidden-xs col-md-2">
                Подписание договора
            </div>
            <div class="hidden-xs col-md-2">
                Получение аванса
            </div>
       
    </div> -->
    

<div class="mb-10" style="color: white;">
    asd
</div>

 <div class="timeline ">
    <?php foreach ($bussiness as $busines): $i++?>
        <?php 
        switch ($busines['СтатусВыполнения']) {
            case '0':
                $status= "в реализации";
                break;
             case '1':
                $status= "выполнено";
                break;
             case '2':
                $status= "не выполнено";
                break;
             case '3':
                $status= "отменено";
                break;
            
            default:
                # code...
                break;
        }
        $class_text = null;
        $class_block = null;

        if ($i%2) {
            $left = "alt";
        } else {
            $left = "";
        }

        if ($cur_date > strtotime(convertDate($busines['ДатаВыполненияПлан'])) and $busines['СтатусВыполнения'] == 2) {
            $class_text = "danger";
            $class_block = "bg-danger";
        } else {
            
        }

        if (!$today) {
            if (strtotime(convertDate($busines['ДатаВыполненияПлан'])) < $cur_date) {
                $trigger_today="top";
            } else {
                $trigger_today="bottom";
            }
        } else {
            $trigger_today=null;
        }

        if (!$class_text) { $class_text = "muted"; }

        if ($busines['СтатусВыполнения'] == 1) {
            $class_text = "success";
            $class_block = "bg-success";
        }
        ?>
        
        <?php if ($trigger_today == "top"): ?>
            <article class="timeline-item alt">
                <div class="text-right">
                    <div class="time-show">
                        <a href="#" class="btn btn-gradient w-lg">Сегодня</a>
                    </div>
                </div>
            </article>
            <?php $today = true; ?>
        <?php endif ?>

        <article class="timeline-item <?=$left?>">
            <div class="timeline-desk">
                <div class="panel">
                    <div class="timeline-box">
                        <span class="arrow-<?=$left?>"></span>
                        <span class="timeline-icon <?=$class_block?>"><i class="mdi mdi-adjust"></i></span>
                        <h4 class="text-<?=$class_text?>"><?=convertDate($busines['ДатаВыполненияПлан'])?></h4>
                        <p class="timeline-date text-muted"><small><?=$busines['Автор']['ФИО']?></small></p>
                        <p class="timeline-date text-muted"><small><?=$status?></small></p>
                        <p><?=$busines['Описание']?></p>
                    </div>
                </div>
            </div>
        </article>
            
        <?php if ($trigger_today == "bottom"): ?>
            <article class="timeline-item alt">
                <div class="text-right">
                    <div class="time-show">
                        <a href="#" class="btn btn-gradient w-lg">Сегодня</a>
                    </div>
                </div>
            </article>
            <?php $today = true; ?>
        <?php endif ?>


    <?php endforeach; ?>
</div>