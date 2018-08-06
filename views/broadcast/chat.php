<?php
    
    use yii\widgets\Pjax;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use app\models\Profile;

    $this->title = 'Чат';
    $this->params['breadcrumbs'][] = ['label' => 'Список трансляции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    
?>

<style>
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
    
</style>

<div class="row">
    <div class="col-12 chat">
        <?php Pjax::begin(); ?>
        <?= Html::a("Обновить", ['/broadcast/chat'], ['class' => 'btn btn-lg btn-primary', 'id' => 'refreshButton', 'style' => 'display:none;']) ?>
            <?php foreach ($message as $mes): ?>
                <div class="row justify-content-<?=($mes['user']['profile']['id'] == \Yii::$app->user->id) ? "end" : "start" ?>">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-2">
                                <img src="<?=Profile::getImageStatic($mes['user']['profile']['id']);?>"  class = "img-fluid" alt="" style = "border-radius: 100px;">
                            </div>
                            <div class="col-10 message px-3 py-2">
                                <div>
                                    <a href="/profiles/<?=$mes['user']['id'] ?>"> <?=$mes['user']['profile']['first_name'] ?> </a> <small> в <?=date('H:i:s', $mes['create_at'])?></small>
                                </div>
                                <div>
                                    <?=$mes['message'] ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php// echo "<pre>".print_r($mes, true)."</pre>"; ?>
                    </div>
                </div>
            <?php endforeach ?>
            

        <?php Pjax::end(); ?>
    </div>
</div>




<?php Pjax::begin(); ?>

<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>
 
    <?= $form->field($model, 'message')->input('text', ['class' => 'pullmessage form-control', 'autocomplete' => 'off']) ?>
 
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'style' => 'cursor:pointer','id' => 'pull_message']) ?>
    </div>
 
    <?php ActiveForm::end(); ?>



<script>
    $(document).ready(function() {
        $("#pull_message").click(function() {
            setTimeout("$('.pullmessage').val('')", 500);
         });

         $('.pullmessage').keyup(function(){
            if(event.keyCode==13)
               {
                  setTimeout("$('.pullmessage').val('')", 500);
                  return false;
               }
        })

    });
</script>
<?php Pjax::end(); ?>



<script>
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 2000);

     

});
    JS;
</script>