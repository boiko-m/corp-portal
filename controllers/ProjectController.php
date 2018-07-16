<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Projects;
use app\models\ProjectNews;
use yii\web\Controller;


class ProjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // if (!\Yii::$app->user->can("controlProject")) {
        //     return $this->goHome();
        // }
        if (\Yii::$app->user->can("controlProject"))
            $projects = Projects::find();
        else
            $projects = Projects::find()->where(['visible' => true]);

        $countQuery = clone $projects;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
        $projects = $projects->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
            'projects' => $projects,
            'pages' => $pages,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionInfo($id)
    {
        if (!\Yii::$app->user->can("controlProject")) {
            return $this->goHome();
        }
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
