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
        $profiles = Profile::find()->where(['OR',
                ['like', 'first_name',  $textSearch],
                ['like', 'last_name',  $textSearch],
            ])->all();
        return JSON::encode($profiles);
    }

    public function actionChooseDialog()
    {
        while ($i <= 33333333) {
            $i = $i + 1;
        }
        $id = Yii::$app->request->get('id');
        return $id;
    }

}