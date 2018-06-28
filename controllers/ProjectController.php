<?php

namespace app\controllers;



class ProjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionInfo($id)
    {
        return $this->render('info');
    }

    public function actionInfoajax($id)
    {
        return $this->renderPartial('info');
    }

    public function actionAll($id)
    {
        return $this->renderPartial('view_bottom');
    }




}
