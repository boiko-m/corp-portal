<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>




 <div class="scroll-gift-view">

                                <div>
                                    <?php
                            foreach ($gift as $value){

                                        if($value['gift']['img'][0] != '/') {
                                            $img = '/'.$value['gift']['img'];
                                        }
                                        else{
                                            $img = $value['gift']['img'];
                                        }
                                        ?>
                                    <div class="block-gift-view">
                                        <span style="float: left">
                                                 <?php
                                                 $nameFrom = $value['userFrom']['profile']['first_name'].' '.
                                                     $value['userFrom']['profile']['last_name'];
                                                 if(isset($value['userFrom']['profile']['img']) && strlen($value['userFrom']['profile']['img']) > 0):?>
                                                     <img src="/img/user/thumbnail_<?=$value['userFrom']['profile']['img']?>" alt="user" class="rounded-circle" style="width: 40px">
                                                 <?else:?>
                                                     <img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle" style="width: 40px">
                                                 <?endif;?>
                                            </span>


                                                <span > <div style="padding: 0 0 0 50px">
                                                     <?=Html::a($nameFrom, Url::to(['/profiles/'.$value['userFrom']['profile']['id']]), ['class' => 'author'])?>
                                                        </div>
                                                    <?php if($value['date'] != null){?>
                                                        <div class="date-gift" >
                                                            <?=date('Y.m.d', $value['date']);?>
                                                        </div>
                                                    <?php }  ?>
                                                </span>

                                                <img class="  gift-in-view" id="<?=$value['id']?>" src="<?=$img?>"  style = " display: block; margin: 30px auto; padding: 0px;  height: 250px; width: 250px;">

                                        <div style="text-align: center"> <?=$value['message'];?></div>

                                    </div>
                                        <hr>
                                            <?php }  ?>

                                </div>
                            </div>

<script>

    $(function(){
        $('.scroll-gift-view').slimScroll({
            height: 'auto',
            position: 'right',
            size: "8px",
            color: '#9ea5ab',
        });
    });
</script>

<style

</style>
