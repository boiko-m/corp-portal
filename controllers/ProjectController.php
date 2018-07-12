<?php

namespace app\controllers;
use app\models\Projects;
use app\models\ProjectNews;


class ProjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->can("controlProject"))
            $projects = Projects::find()->all();
        else
            $projects = Projects::find()->where(['visible' => true])->all();

        return $this->render('index', [
            'projects' => $projects,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionInfo($id)
    {
        return $this->render('info', [
            'project' => Projects::findOne($id),
            'project_news' => ProjectNews::find()->where(['id_project' => $id])->all(),
        ]);
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
