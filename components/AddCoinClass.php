<?php
namespace app\components;
use app\models\Profile;
use Yii;
class AddCoinClass  extends \yii\base\Component
{
    public function init() {

        $user = Profile::find()->where(['id' => Yii::$app->user->id])->one();
        if( $user->last_coin == null){
            $user->last_coin = time();
            $user->coins = $user->coins + 6;
            $user->save();
        }
        $currentData = date('y,m,d', time());
        if($currentData != date('y,m,d',$user->last_coin)){
            $user->coins = $user->coins + 3;
            $user->last_coin = time();
            $user->save();
        }
    }
}