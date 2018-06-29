<?php
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>



<?php

foreach ($giftType as $type_gift){
   $gift_type_id[] = $type_gift['id'];//массив со всеми типами подарков
}
    foreach ($allGift as $type) {
        if ($type['visible'] != 1) {
            continue;
        }
        for($i= 0; $i<=count($gift_type_id); $i++) {
        if ($type['giftType']['id'] == $gift_type_id[$i]) {
            $gift[$i][] = $type;   // создание массива со всеми подарками

        }
    }
}


?>


<!--
--><?php
?>

<div class="col-md-8" style=" float:left">
    <div style="height: 400px;" >
        <div id="slimmcroll">


    <?php
    $i= 0;

    foreach ($gift as $arr){ $i++;
        /*debug($arr[0]['giftType']['name']);*/
        ?>

    <h5><?=$arr[0]['giftType']['name']?></h5>

    <div class="carousel">
        <?php

        if(count($arr)>4){?>

            <div class="carousel-button-left  hidden left<?=$i;?>" id="<?='left'.$i;?>" data-count="<?=$i;?>" onclick="functCalc(<?=$i;?>, 'left')"><a href="#"></a></div>

                <div class="carousel-button-right " id="<?='right'.$i;?>" data-count="<?=$i;?>" onclick="functCalc(<?=$i;?>, 'right')"><a href="#"></a></div>


        <?php }?>
        <div class="carousel-wrapper">
            <div class="carousel-items">
                <?php
              /*  $value_result1 = array();
                $value_result2= array();
                foreach ($arr[1] as $value1){
                     if($profile->coins < $value1['sum_coin']){
                        $value_result1[] = $value1;
                    }
                    else{
                        $value_result2[] = $value1;
                    }
                }
                $valuex = array_merge($value_result1, $value_result2);*/
           /* for($j=0; $j<=count($gift_type); $j++){

            }*/
                foreach ($arr as $value){
                    if($value['img'][0] != '/') {
                        $img = '/'.$value['img']; }
                    else{ $img = $value['img']; } ?>
                    <?php if($profile->coins < $value['sum_coin']){
                        //$value_result1[] = $value1;
                        $style = 'opacity-modal';
                    }
                    else{
                        //$value_result2[]= $value;
                        $style ='canСhoose';
                    }


                        ?>

                    <div class="carousel-block">
                        <?php $vallast1 = substr($value['sum_coin'], -1);
                        $vallast2 = substr($value['sum_coin'], -2);
                        if($vallast1 == 1){ $text = '1 монета'; }
                        elseif($value['sum_coin'] == 0){ $text = 'Бесплатно'; }
                        elseif (preg_match('/[1][1-9]?/', $vallast2)){ $text = $value['sum_coin'].' монет';}
                        elseif($vallast1 == 2 || $vallast1 == 3 || $vallast1 == 4){ $text = $value['sum_coin'].' монеты';}

                        else{ $text = $value['sum_coin'].' монет';}
                        ?>
                        <img src="<?=$img?>" id="<?=$value['id']?>" data-coin="<?=$value['sum_coin']?>" data-sumcoin="<?=$text?>"
                             class="shadow-modal <?=$style?>" style = " height: 65px; width: 65px;">


                        <div id="gift-cost<?=$value['id']?>" class="hidden gift-cost"><?=$text?> </div>
                </div>

                <?php }?>







            </div>
        </div>
    </div>
    <?php }?>

</div>
</div>
</div>


<div class="col-md-4" style="float:left; height: 440px">
    <h6 class="" style="">Мои монеты: <?=$profile->coins?></h6>

<div class="hidden" id="form-for-gift">
    <h6>Сообщение</h6>
    <div id="gift">
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'form',
        'action' => '/profiles/'.$curentId['data'],

    ]) ?>
    <?= $form->field($model, 'message')->textarea(['style' => 'height: 180px; max-height: 180px'])->label(false);
    //echo Html::activeHiddenInput($model, 'hiddenInput');
    echo $form->field($model, 'id_gift')->hiddenInput()->label(false);
    echo Html::activeHiddenInput($model, 'costCoin');
    ?>

    <?php ActiveForm::end() ?>
   <div class="choosenGift">

       <div style="margin: 10px">
           <img src="" class="img-to-send" style = "border-radius: 5px; height: 80px; width: 80px; float: left;  margin-left: 20px; ">
           <div class="sum-coin gift-cost-tosend" style=""></div>
       </div>



    <?= Html::submitButton('Подарить', ['name' => 'submit1', 'class' => 'btn  waves-effect w-md btn-light gift-submit ', 'form' => 'form']) ?>

</div>
   </div>



<script>

    $(function(){
        $('#slimmcroll').slimScroll({
            height: 'auto',
            position: 'right',
            size: "8px",
            color: '#9ea5ab'
        });
    });


    $(document).on("mouseenter", ".shadow-modal", function() {
        var cost = $(this).attr('id');
        $('#gift-cost'+cost).removeClass('hidden');
    });

    $(document).on("mouseleave", ".shadow-modal", function() {
        var cost = $(this).attr('id');
        $('#gift-cost'+cost).addClass('hidden');
    });
</script>
