<?php
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php Pjax::begin();
?>

<script>

    $(".canСhoose").on('click', function() {
         var atr = $(this).attr('id');
        var atr1 = $(this).attr('data-coin');
        $('.canСhoose').removeClass('shadow');
         $("#"+atr ).addClass('shadow');
         $('#giftuser-id_gift').val(atr);
         $('#giftuser-costcoin').val(atr1);


    });


</script>


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
    <?php foreach ($bigArr as $arr){?>
    <h3><?=$arr[0]?></h3>

    <div class="carousel">
        <div class="carousel-button-left"><a href="#"></a></div>
        <div class="carousel-button-right"><a href="#"></a></div>
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

                        <img src="<?=$img?>" id="<?=$value['id']?>" data-coin="<?=$value['sum_coin']?>" class="shadow-modal <?=$style?>" style = "border-radius: 5px; <?=$style?> height: 60px; width: 60px;">


                    </div>
                <?php }?>
            </div>
        </div>
    </div>
    <?php }?>


</div>
</div>
<div class="col-md-4">
    <h5>What is Lorem Ipsum?</h5>
    What is Lorem Ipsum?
    <h4>Прикрепить сообщение к подарку</h4>

    <?php
    $form = ActiveForm::begin([
        'id' => 'form',
        'action' => '/profiles/'.$curentId['data'],

    ]) ?>
    <?= $form->field($model, 'message')->textarea()->label(false);
    //echo Html::activeHiddenInput($model, 'hiddenInput');
    echo $form->field($model, 'id_gift')->hiddenInput()->label(false);
    echo Html::activeHiddenInput($model, 'costCoin');
    ?>
</div>

<?= Html::submitButton('Подарить', ['name' => 'submit1', 'class' => 'btn btn-primary', 'form' => 'form']) ?>



<script>

    $(function(){
        $('#slimmcroll').slimScroll({
            height: '400px',
            railVisible: true,
        });
    });


</script>

<?php ActiveForm::end() ?>

</div>

<?php Pjax::end(); ?>
