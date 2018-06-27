<?php

namespace app\modules\conversation\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileMain;
use yii\web\Controller;
use yii\helpers\Json;
use yii\web\Response;

class DialogController extends \yii\web\Controller
{
    public function actionSearchEmployees()
    {
        $textSearch = Yii::$app->request->get('text');
        $profiles = Profile::find()->asArray()->where(['like', 'last_name',  $textSearch])->with('user')
            ->orWhere(['like', 'first_name',  $textSearch])->all();
        return JSON::encode($profiles);
    }

}
