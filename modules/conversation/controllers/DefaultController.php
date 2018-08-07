<?php

namespace app\modules\conversation\controllers;

use Yii;
use yii\web\Controller;
use app\models\Messages;


/**
 * Default controller for the `im` module
 */
class DefaultController extends Controller
{

	/**
	* @return array
	*/
	public function actions()
	{
	    return [
	    	'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
	    ];
	}

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
