<?php
namespace app\components;
use Yii;
use app\models\Profile;


class UpdateLastVisitClass extends \yii\base\Component{

    public function init() {
    	$id = Yii::$app->user->id;
        if(!empty($id)){
            $profile = Profile::find()->where(['id' => $id])->one();
            $profile->last_visit = time();
            $profile->save();
            parent::init();
        }
        
    }

}