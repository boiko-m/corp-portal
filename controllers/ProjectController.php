<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use app\models\Projects;
use app\models\Stage;
use app\models\ProjectNews;
use app\models\ProjectUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;


class ProjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->can("controlProject"))
            $projects = Projects::find();
        else
            $projects = Projects::find()->where(['visible' => true])->orderBy('name');

        $countQuery = clone $projects;
        // $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $projects = $projects->offset($pages->offset)->orderBy('name')->limit($pages->limit)->all();

        return $this->render('index', [
            'projects' => $projects,
            'pages' => $pages,
            'colorsStatus' => array("Завершен" => "grey", "В работе" => "green"),
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'project' => Projects::findOne($id),
            'project_news' => ProjectNews::find()->where(['id_project' => $id])->orderBy('id desc')->all(),
            'project_group' => ProjectUser::find()->where(['id_project' => $id])->with('profile')->orderBy('id_project_user_group')->all(),
						'stages' => Stage::find()->where(['id_project' => $id])->all(),
        ]);
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
        return $this->renderPartial('about', array(
					'project' => Projects::findOne($id),
				));
    }

    public function actionAll($id)
    {
        return $this->renderAjax('view_bottom');
    }
	
		public function actionAddStage()
    {
			$stage = new Stage();
			$stage->name = (Stage::find()->where(['id_project' => Yii::$app->request->post('id-project')])->count() + 1) . ' этап';
			$stage->create_at = time();
			$stage->date_begin = strtotime(Yii::$app->request->post('stage-begin'));
			$stage->date_end = strtotime(Yii::$app->request->post('stage-end'));
			$stage->id_project = intval(Yii::$app->request->post('id-project'));
			$stage->save();
    }

    public function actionFindProject() {
        $textSearch = Yii::$app->request->post('text');
        $projects = Projects::find()->where('name LIKE :search')
            ->params([':search' => '%' . $textSearch . '%'])->orderBy('name')->all();
        return JSON::encode($projects);
    }

    public function actionGetAllProjects() {
        $projects = Projects::find()->orderBy('name')->all();
        return JSON::encode($projects);
    }

}
