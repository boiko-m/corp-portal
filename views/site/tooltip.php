<div class="toolajax">
    <div class="row" style="padding: 10px">
<div class="col-md-3">
   <?if(isset($profile->img) && strlen($profile->img) > 0):?>
        <img src="/img/user/thumbnail_<?=$profile->img?>" alt="user" class="rounded-circle" style="width: 45px">
    <?else:?>
        <img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle" style="width: 40px">
    <?endif;?>
</div>
    <div class="col-md-9" style=" text-align: justify">
        <div style="">

                <?=\yii\helpers\Html::a($profile->first_name. '&nbsp;'.$profile->last_name, \yii\helpers\Url::to(['/profiles/'.$profile->id]),
                    ['class' => 'author', 'style' => 'text-align: left'])?>
            </div>

                <div style="color: #0a0a0a; text-align: left" >
                    <?=$profile->position;?>
                </div>
                <div style="color: #0a0a0a; text-align: left" >
                     <?=$profile->branch;?>
                </div>

    </div>
        </div>

  <!--  <div style="width: 20%; float:left">
        123123
    </div>

    <div style="width: 80%; float:right">
       12312
    </div>-->

    </div>
