<?php  $time_online = time() - 180;
if($profile->last_visit>= $time_online){
    $online = "<div class='circle'></div>";
}
else $online= '';
?>

<?=\yii\helpers\Html::a($profile->first_name. ' '.$profile->last_name. $online, \yii\helpers\Url::to(['/profiles/'.$profile->id]),
    ['class' => 'author tooltipAjax', 'style' => 'text-align: left'])?>