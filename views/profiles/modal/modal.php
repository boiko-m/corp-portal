<?php
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>






<?php
foreach ($allGift as $type) {
    if($type['visible'] != 1){
        continue;
    }
    if ($type['giftType']['name'] == 'Обычные') {
        $usual[] = $type;
    } elseif ($type['giftType']['name'] == 'Особые') {
        $special[] = $type;
    } elseif ($type['giftType']['name'] == 'Сезонные') {
        $season[] = $type;
    } elseif ($type['giftType']['name'] == 'Корпоративные') {
        $corporate[] = $type;
    } elseif ($type['giftType']['name'] == 'Элитные') {
        $elite[] = $type;
    }
}?>
<?php
$bigArr[0]    = [
             $arr[0] = 'Обычные',
            $arr[1] = $usual
];
$bigArr[1]    = [
    $arr[0] = 'Особые',
    $arr[1] = $special
];
$bigArr[2]    = [
    $arr[0] = 'Сезонные',
    $arr[1] = $season
];
$bigArr[3]    = [
    $arr[0] = 'Корпоративные',
    $arr[1] = $corporate
];
$bigArr[4]    = [
    $arr[0] = 'Элитные',
    $arr[1] = $elite
];
?>

<div class="col-md-8">
    <div id="slimmcroll">
    <?php
    $i= 0;
    foreach ($bigArr as $arr){ $i++;?>
    <h4><?=$arr[0]?></h4>

    <div class="carousel">
        <?php if(count($arr[1])>4){?>
            <div class="carousel-button-left  hidden left<?=$i;?>" id="<?='left'.$i;?>" data-count="<?=$i;?>" onclick="functCalc(<?=$i;?>, 'left')"><a href="#"></a></div>
            <div class="carousel-button-right " id="<?='right'.$i;?>" data-count="<?=$i;?>" onclick="functCalc(<?=$i;?>, 'right')"><a href="#"></a></div>
        <?php }?>
        <div class="carousel-wrapper">
            <div class="carousel-items">
                <?php
                foreach ($arr[1] as $value){
                    if($value['img'][0] != '/') {
                        $img = '/'.$value['img']; }
                    else{ $img = $value['img']; } ?>
                    <?php if($profile->coins < $value['sum_coin']){
                        $style = 'opacity-modal';
                    }
                    else{
                        $style ='canСhoose';
                    }
                        ?>

                    <div class="carousel-block">

                        <img src="<?=$img?>" id="<?=$value['id']?>" data-coin="<?=$value['sum_coin']?>" class="shadow-modal <?=$style?>" style = " height: 60px; width: 60px;">

                       <?php $vallast1 = substr($value['sum_coin'], -1);
                       $vallast2 = substr($value['sum_coin'], -2);
                       if($vallast1 == 1){ $text = '1 монета'; }
                       elseif($value['sum_coin'] == 0){ $text = 'Бесплатно'; }
                       elseif (preg_match('/[1][1-9]?/', $vallast2)){ $text = $value['sum_coin'].' монет';}
                       elseif($vallast1 == 2 || $vallast1 == 3 || $vallast1 == 4){ $text = $value['sum_coin'].' монеты';}

                       else{ $text = $value['sum_coin'].' монет';}
                       ?>
                        <div id="gift-cost<?=$value['id']?>" class="hidden gift-cost"><?=$text?> </div>
                </div>

                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>

</div>
</div>

<div class="col-md-4">
    <h5 class="btn  waves-effect w-md btn-light gift-submit ">Мои монеты: <?=$profile->coins?></h5>
<div class="hidden" id="form-for-gift">
    <h4>Cообщение</h4>
    <div id="gift">
    </div>

    <?php
    $form = ActiveForm::begin([
        'id' => 'form',
        'action' => '/profiles/'.$curentId['data'],

    ]) ?>
    <?= $form->field($model, 'message')->textarea(['rows' => '8'])->label(false);
    //echo Html::activeHiddenInput($model, 'hiddenInput');
    echo $form->field($model, 'id_gift')->hiddenInput()->label(false);
    echo Html::activeHiddenInput($model, 'costCoin');
    ?>

    <?php ActiveForm::end() ?>
    <div class="choosenGift"></div>
    <?= Html::submitButton('Подарить', ['name' => 'submit1', 'class' => 'btn  waves-effect w-md btn-light gift-submit ', 'form' => 'form']) ?>

</div>
</div>



<script>

    $(function(){
        $('#slimmcroll').slimScroll({
            height: '400px',
            railVisible: true,
        });
    });

    $(function(){
        $('.shadow-modal').hover(function(){
                var cost = $(this).attr('id');
                $('#gift-cost'+cost).removeClass('hidden');
            },
            function(){
                var cost = $(this).attr('id');
                $('#gift-cost'+cost).addClass('hidden');
            });
    });
</script>

