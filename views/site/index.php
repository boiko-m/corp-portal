<?php

/* @var $this yii\web\View */

$this->title = 'Главная';

//echo "<pre>".print_r($users, true)."</pre>";
?>






<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="card-box">
                <h5 class="card-title">Новости</h5>
                <div class="col-xs-12 conteiner-fluid">
                    <?php foreach ($news as $item): ?>
                        <div class="col-xs-12" style="margin-top: 10px;">
                            <a href="/news/<?=$item['id']?>" style="color:#444444">
                                <?=$item['title'] ?> <br><small class="text-muted">от <?=date("d.m.Y h:i:s",$item['date']) ?></small>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div style="padding-top: 10px;">
                    <button class="btn btn-link waves-effect w-md btn-warning">Открыть все новости</button>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="card-box">
                <h5 class="card-title">Новое видео на портале</h5>
                <div class="m-b-10">
                    <a href="/video/<?=$video['id']?>">
                        <img src="http://portal.lbr.ru/img/videos/4dhYmbB1pEA.jpg" alt="" style="width: 100%">
                    </a>
                </div>
                <div class="block m-t-10" style="padding-top: 10px">
                    <button class="btn btn-outline-warning waves-light waves-effect w-md btn-block">Форум</button>
                    <button class="btn btn-outline-warning waves-light waves-effect w-md btn-block">Все видео</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-md-4 ">
        <div class="card-box font-13">
            Дни рождения сегодня
        </div>
    </div>
    <div class="col-xs-12 col-md-4 ">
        <div class="card-box">
            Новые сотрудники

            <div>
            <?php // echo var_dump($user_new); ?>
            <?php foreach ($user_new as $user): ?>
                <div class="row" style="padding:10px">
                   <div class="col-2">
                       <img src="http://portal.lbr.ru/<?=$user->getImage();?>" alt="" style = "width: 50px;border-radius: 5px;">
                   </div>
                   <div class="col-10" >
                        <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a> <br>
                        <div style="font-size: 11px">
                            <?=$user->branch ?>, <?=$user->position ?>
                        </div>
                   </div>
                </div>
            <?php endforeach ?>
        </div>

        </div>
        
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="card-box">
            <div>
                Коллеги онлайн
            </div>
            <div class="row">
                <div class="col">
                    <?php foreach ($online as $user): ?>
                        <div class="row" style="padding:10px">
                           <div class="col-2">
                               <img src="http://portal.lbr.ru/<?=$user->getImage();?>" alt="" style = "width: 50px;border-radius: 5px;">
                           </div>
                           <div class="col-10" >
                                <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a> <br>
                                <div style="font-size: 11px">
                                    <?=$user->branch ?>, <?=$user->position ?>
                                </div>
                           </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
    

</div>