<?php

namespace app\controllers;
use Yii;

use app\models\FaqType;
use app\models\Faq;
use app\models\FaqSearch;

class HelpController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new FaqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['date' => 'DESC']];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
    	return $this->render('view', array(
        	'data' => Faq::findOne($id)
        ));
    }

}
