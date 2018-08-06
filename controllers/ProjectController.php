<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Projects;
use app\models\ProjectNews;
use app\models\ProjectUser;
use yii\web\Controller;


class ProjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->can("controlProject"))
            $projects = Projects::find();
        else
            $projects = Projects::find()->where(['visible' => true]);

        $countQuery = clone $projects;
        // $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
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
        if (\Yii::$app->user->can("controlProject"))
            $projects_news = ProjectNews::find()->where(['id_project' => $id])->orderBy('id desc')->all();
        else
            $projects_news = ProjectNews::find()->where(['id_project' => $id, 'visible' => true])->orderBy('id desc')->all();

        return $this->render('info', [
            'project' => Projects::findOne($id),
            'project_news' => $projects_news,
            'project_group' => ProjectUser::find()->where(['id_project' => $id])->orderBy('id_project_user_group')->all(),
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
