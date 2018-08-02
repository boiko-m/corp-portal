<?php

namespace app\controllers;

use Yii;
use app\models\AnswersUser;
use app\models\Answers;
use yii\web\Controller;
use yii\helpers\Json;

class QuestionnaireController extends Controller
{
    public function actionUserAnswer()
    {
        if (Yii::$app->request->post()) {
            foreach (Yii::$app->request->post() as $key => $answer) {
            	$answer_user = new AnswersUser();
            	$answer_user->date = time();
        		$answer_user->id_user = Yii::$app->user->id;
            	$answer_user->id_answer = $answer;
                $answer_user->id_question = (Answers::findOne($answer))->id_question;
            	$answer_user->save();
        	}
        	return 0;
        }
    }

}
