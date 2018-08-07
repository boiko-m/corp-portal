<?php

    use app\models\ChatBroadcast;
    use yii\widgets\Pjax;
    use yii\helpers\Html;
    use app\models\Profile;
    use yii\widgets\ActiveForm;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Список трансляции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;


    $users_online = \Yii::$app->visit->get([
        'controller' => 'broadcast',
        'action' => 'view',
        'id'=> $model->id,
        'return' => true
    ]);


?>

<style>
    .user-online {
        display: inline-block;
    }
    .user-online-block {

        height:81px;
    }
    .user-online-block > div > div {
        padding-right: 10px;
    }
    .overlay {
        position: absolute;
        top: 0;
        margin: 20px 15px 15px 15px;
        width: calc(100% - 70px);
        height: 100%;
        background-image: -webkit-linear-gradient(top, black, black 10%, transparent 10%, transparent 100%);
    }
    .chat > div > div > div{
        transition: 0.3s;
    }
    .chat > div > div > div {
        padding: 5px;
    }
    .chat .message {
        background: white;
        border-radius: 5px;
    }
    .chat small {
        color:#a4a4a4;
    }
    .control-label {
        display: none
    }
    .form-group {
        margin-bottom:2px;
    }
    
    #carouselExampleControls::-webkit-scrollbar {
      width: 6px;
    }

    /* Track */
    #carouselExampleControls::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px #e5e5e5;
      -webkit-border-radius: 5px;
      border-radius: 5px;
    }

    /* Handle */
    #carouselExampleControls::-webkit-scrollbar-thumb {
      -webkit-border-radius: 5px;
      border-radius: 5px;
      background: #e5e5e5;
    }

    #carouselExampleControls::-webkit-scrollbar-thumb:window-inactive {
      background: #e5e5e5;
    }


    .carouselExampleControls::-webkit-scrollbar {
          height: 7px;
    }

    /* Track */
    .carouselExampleControls::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px #e5e5e5;
      -webkit-border-radius: 5px;
      border-radius: 5px;
    }

    /* Handle */
    .carouselExampleControls::-webkit-scrollbar-thumb {
      -webkit-border-radius: 5px;
      border-radius: 5px;
      background: #e5e5e5;
    }

    .carouselExampleControls::-webkit-scrollbar-thumb:window-inactive {
      background: #c9c9c9;
    }
</style>

<div class="row">
    <div class="col-8 card-box" style="position:relative; "> 
         <iframe class="col-12" id="broadcast-player" height="490" src="<?= $model->link ?>?autoplay=1&controls=0" frameborder="0" allow="autoplay; encrypted-media;" allowfullscreen></iframe>   
        <div class="col-12 overlay"></div>
        <div class="row">
            <div class="col-3 p-4">
                <a href="/broadcastfull/<?=$model->id?>"  class="btn btn-light waves-effect"> <i class=" mdi mdi-access-point-network m-r-5"></i> <span>Во весь экран</span> </a>
            </div>
            <div class="col-7 pt-4">
                <div style="padding-top: 7px;">
                    Количество просматривающих: <br> 
                    <span style="font-size:30px">
                        <?php 
                        echo count($users_online); ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;">
            <div class="col-12 d-none d-md-block user-online-block carouselExampleControls" style="width:3000px;overflow: auto !important;">
                   <div style="height: 10px" class="d-flex">
                       <?php foreach ($users_online as $user): ?>
                           <div title = "<?=$user->first_name?> <?=$user->last_name?>" style = "width:60px; text-align: center" class = "user-online">
                               <div>
                                    <a href="/profiles/<?=$user->id?>" target = "_blank" class = "mx-auto d-block">
                                       <img src="<?=Profile::getImageStatic($user->id);?>" class = "" alt="" style = "width:50px;border-radius: 100px;">
                                    </a>
                               </div>
                               <div class="text-center">
                                    <a href="/profiles/<?=$user->id?>" target = "_blank">
                                        <small><?=$user->first_name?></small>
                                    </a>
                               </div>
                           </div>
                       <?php endforeach ?>
                   </div>
            </div>
        </div>
    </div>
    <div class="col-4 chat">
        <div class="row">
            <div class="col-12">
                <h4>Чат</h4>
            </div>
        </div>
        <div id = "carouselExampleControls" style="height: 500px;overflow: auto !important;">
            <?php Pjax::begin(); ?>
            <?= Html::a("Обновить", ['/broadcast/'.$model->id], ['class' => 'btn btn-lg btn-primary', 'id' => 'refreshButton', 'style' => 'display:none;']) ?>
                <?php foreach ($message as $mes): ?>
                    <?php if ($mes['message'] != "") { ?>
                    <div class="row mx-1 justify-content-<?=($mes['user']['profile']['id'] == \Yii::$app->user->id) ? "end" : "start" ?>">
                        <div class="col-11">
                            <div class="row ">
                                <div class="col-2 align-self-center">
                                    <a href="/profiles/<?=$mes['user']['id'] ?>" target="_blank">
                                        <img src="<?=Profile::getImageStatic($mes['user']['profile']['id']);?>"  class = "img-fluid" alt="" style = "border-radius: 100px;">
                                    </a>
                                </div>
                                <div class="col-10 message px-3 py-2" style="background:<?=($mes['user']['profile']['id'] != \Yii::$app->user->id) ? 'white' : '#e1e5eb'?>">
                                    <div>
                                        <a target = "_blank" href="/profiles/<?=$mes['user']['id'] ?>"> <?=$mes['user']['profile']['first_name'] ?> </a> <small> в <?=date('H:i:s', $mes['create_at'])?></small>
                                    </div>
                                    <div>
                                        <?php if ($mes['message'] == ':smile') { ?>
                                            <div class="text-center">
                                                <img src="http://portal.lbr.ru/img/gift/gift_1530257840.jpg" alt="Котик манул. Секретный смайл" class="" style="width: 50%">
                                            </div>
                                        <?php } else {?>
                                            <?=$mes['message'] ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php// echo "<pre>".print_r($mes, true)."</pre>"; ?>
                        </div>
                    </div>
                    <?php } ?>
                <?php endforeach ?>
            <?php Pjax::end(); ?>
        </div>
        

        <?php Pjax::begin(); ?>

        <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'class' => 'pt-2']]); ?>
         
        <?= $form->field($chat, 'message')->input('text', ['placeholder' => 'Ваше сообщение','class' => 'pullmessage form-control', 'autocomplete' => 'off']) ?>

        <div class="form-group mx-0" >
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'style' => 'cursor:pointer;width:100%;','id' => 'pull_message', 'required' => true] ) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <script>
            function pull() {
                $('.pullmessage').val('')
               /* var messages_list = $('#carouselExampleControls');
                var height = messages_list[0].scrollHeight;
                messages_list.scrollTop(height);*/
                var objDiv = $("#carouselExampleControls");
                var h = objDiv.get(0).scrollHeight;
                objDiv.animate({scrollTop: h});
            }

            $(document).ready(function() {

                var objDiv = $("#carouselExampleControls");
                var h = objDiv.get(0).scrollHeight;
                objDiv.animate({scrollTop: h});

                $("#pull_message").click(function() {
                    setTimeout("pull()", 1000);
                 });

                 $('.pullmessage').keyup(function(){
                    if(event.keyCode==13)
                       {
                          setTimeout("pull()", 1000);

                          return false;
                       }
                })

            });
        </script>
        <?php Pjax::end(); ?>



    </div>
</div>

<script>
    function concealment(){
      $('.overlay').css('background-image', 'none')
    }
    setTimeout(concealment, 8000);
</script>


<script>



$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 2000);
});
</script>