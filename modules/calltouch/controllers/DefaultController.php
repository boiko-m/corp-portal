<?php

namespace app\modules\calltouch\controllers;

use yii\web\Controller;
use app\models\Calltouch;
use yii\web\HttpException;
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
        $calltouch_test = new Calltouch();


        $params = Yii::$app->request->get();

        /*foreach ($params as $key => $value) {
            if ($key == 'id') {
                $calltouch->id_calltouch = $value;
            } else {
                $calltouch->$key = $value;
            }
        }*/
        

        $calltouch_test->reclink = json_encode($params, true);

        if (!$calltouch_test->save()) {
            //$calltouch->errors;
            //throw new HttpException(404, 'Не найдены нужные параметры.');
            return 'Не найдены нужные параметры';
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
