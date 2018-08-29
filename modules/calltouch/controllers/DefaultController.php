<?php

namespace app\modules\calltouch\controllers;

use yii\web\Controller;
use app\models\Calltouch;
use Yii;

/**
 * Default controller for the `calltouch` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

    	$calltouch = new Calltouch();

        $params = (Yii::$app->request->get()) ? Yii::$app->request->get() : Yii::$app->request->post();

    	foreach ($params as $key => $value) {
    		if ($key == 'id') {
    			$calltouch->id_calltouch = $value;
    		} else {
    			$calltouch->$key = $value;
    		}    		
    	}

        if (!$calltouch->save()) {
            $calltouch->errors;
        } else {
            return 'true';
        }

        return $this->render('index');
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== "index");
        return parent::beforeAction($action);
    }

}
