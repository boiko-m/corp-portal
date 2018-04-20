<?php

namespace app\controllers;
use app\models\FaqType;
use app\models\Faq;


class TrainingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', array(
        	'faqs' => FaqType::find()->where("id>1")->all()
        ));
    }
    public function actionType($id) {
    	return $this->render('viewtype', array(
        	'faqtype' => FaqType::find()->where(['id' => $id])->one(),
        	'faqs' => Faq::find()->where(['id_type' => $id])->all()
        ));
    }
    public function actionView($id) {
    	$faq = Faq::find()->where(['id' => $id])->one();
    	if ($faq) {
    		$faqtype = FaqType::find()->where(['id' => $faq->id_type])->one();

	    	return $this->render('view', array(
	        	'faqtype' => $faqtype,
	        	'faq' => $faq
	        ));
    	}
    }

}
