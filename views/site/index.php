<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
use app\models\Profile;
use app\models\Session;
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

?>
<style>
    .news-a > a {
        color:#444444;
        transition: 0.3s;
        display: block;
        padding: 5px;
    }
    .news-a a:hover {
        color: black;
        background: #f5f5f5;
    }
    .news-offer {
        text-decoration: underline;
        font-size: 11px;
        color: #747474;
    }
</style>
<div class="row">
    <div class="col-xs-12 col-md-8 m-b-30">
        <div class="card">
            <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Новости
                    </a>
                </li>
            </ul>
            <div class="tab-content" style="padding-top: 10px;">
                <div class="tab-pane fade active show" id="home-b1">
                    <div style="margin-bottom: 15px;">
                        <?php foreach ($news as $item): ?>
                            <div class="col-xs-12 news-a" >
                                <a href="/news/<?=$item['id']?>" style = "padding-left: 15px;">
                                    <?=$item['title'] ?> <br><small class="">от <?=date("d.m.Y h:i:s",$item['date']) ?></small>
                                </a>
                            </div>
                        <?php endforeach ?>
                        <div style="padding-left: 10px;">
                            <div style="padding-top: 10px; display: inline-block; ;">
                                <a href="/news" class="btn  waves-effect w-md btn-light">Открыть все новости</a>
                            </div>
                            <div style="padding-top: 10px; display: inline-block;">
                                <a href="/news/offer" class="news-offer">Предложить новость</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="card">
            <h5 class="card-title" style="padding: 15px">Новое видео на портале</h5>
            <div class="m-b-10">
                <a href="/video/id/<?=$video['id']?>">
                    <div class="d-flex justify-content-around">
                        <img class = "col-3 ml-15 " src="/img/icon/youtube.png" alt="" style="position: absolute;padding-top: 100px">
                    </div>

                    <img src="/<?=$video['img']?>" alt="" style="width: 100%">



                </a>
            </div>
            <div class="block m-t-10" style="padding: 10px">

                <form action="/video" style="padding-bottom: 8px">
                    <input type="hidden" name = "tab" value="forum">
                    <button class="btn btn-outline-warning waves-light waves-effect w-md btn-block">Форум</button>
                </form>
                <form action="/video">
                    <input type="hidden" name = "tab" value="allvideo">
                    <button class="btn btn-outline-warning waves-light waves-effect w-md btn-block">Все видео</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <?php if ($birthdays): ?>
        <div class="col-xs-12 col-md-4 ">

            <div class="card-box">
                <div>
                    Сегодня отмечают дни рождения

                </div>
                <div>

                    <?php foreach ($birthdays as $user): ?>
                        <div class="row" style="padding:10px">
                            <div class="col-2">
                                <img src="<?=$user->getImage();?>" alt="" style = "width: 50px;border-radius: 5px;">
                            </div>
                            <div class="col-10" >
                                <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a> <br>
                                <div style="font-size: 11px">
                                    <?=$user->branch ?>, <?=$user->position ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div style="padding-top: 10px; display: inline-block;">
                        <?= Html::a('Открыть ближайшие', Url::to(['/profiles/birthday']), ['class' => 'btn  waves-effect w-md btn-light', ])?>

                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
    <?php endif ?>

    <div class="col-xs-12 col-md-4 ">
        <div class="card-box">
            Новые сотрудники

            <div>

                <?php // echo var_dump($user_new); ?>
                <?php foreach ($user_new as $user): ?>
                    <div class="row" style="padding:10px">
                        <div class="col-2">
                            <img src="<?=$user->getImage();?>" alt="" style = "width: 50px;border-radius: 5px;">
                        </div>
                        <div class="col-10" >
                            <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a> <br>
                            <div style="font-size: 11px">
                                <?=$user->branch ?>, <?=$user->position ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div style="padding-top: 10px; display: inline-block;">

                    <?= Html::a('Список', Url::to(['/profiles', 'param' => 'new' ]), ['class' => 'btn  waves-effect w-md btn-light', ])?>

                </div>
            </div>

        </div>

    </div>


    <?php /*

    <div class="col-xs-12 col-md-4">
        <div class="card-box">

            <div>
                Пользователи в сети: <?=count($online) ?>
            </div>
            <div class="row">
                <div class="col">
                    <?php if ($online): ?>
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
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

*/
    ?>



</div>


</div>
