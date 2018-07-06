<div class="toolajax">
    <div class="row" style="padding: 4px">
       <div class="col-md-2  "><?if(isset($profile->img) && strlen($profile->img) > 0):?><img src="/img/user/thumbnail_<?=$profile->img?>" alt="user" class="rounded-circle ajax-tooltip-img">
           <?else:?><img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle ajax-tooltip-img"><?endif;?></div>
        <div class="col-md-9" style="margin-left: 20px">
                     <div>
                         <?=\yii\helpers\Html::a($profile->first_name. '&nbsp;'.$profile->last_name, \yii\helpers\Url::to(['/profiles/'.$profile->id]),
                         ['class' => 'href-tooltip'])?>
                     </div>
                     <div class="online-in-tooltip"><?=' '.$online?></div>
                    <div class="text-in-tooltip">
                        <?=$profile->position;?>
                    </div>
                    <div class="text-in-tooltip">
                        <?=$profile->branch;?>
                    </div>

        </div>
        <div  class="col-md-12" style="text-align: center;">
            <button type="button" class="btn btn-light waves-effect w-md" style="font-size: 10px;margin-top: 10px">Написать сообщение</button>
        </div>
    </div>
</div>
