<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use app\models\Projects;
use app\models\Stage;
use app\models\StageGoal;
use app\models\StageResult;
use app\models\ProjectNews;
use app\models\ProjectUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
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
            'colorsStatus' => array("Завершен" => "complited", "В работе" => "in_work", "В плане" => "in_plane"),
        ]);
    }

    public function actionView($id)
    {
			if (!ProjectUser::findOne(['id_project' => $id, 'id_user' => Yii::$app->user->id]) && !Yii::$app->user->can("Scrum-master"))
				throw new ForbiddenHttpException("Доступ запрещен. Нажмите на кнопку 'Принять участие в проекте' и ожидайте ответа");

			$objects = StageGoal::find()->joinWith('stage')->andWhere(['id_project' => $id]);
			$countQuery = clone $objects;
			$objectPages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2]);
      $objects = $objects->offset($objectPages->offset)->limit($objectPages->limit)->all();

			return $this->render('view', [
				'project' => Projects::findOne($id),
				'project_news' => ProjectNews::find()->where(['id_project' => $id])->orderBy('id desc')->all(),
				'project_group' => ProjectUser::find()->where(['id_project' => $id])->with('profile')->orderBy('id_project_user_group')->all(),
				'stages' => Stage::find()->where(['id_project' => $id])->all(),
				'objects' => $objects,
				'objectPages' => $objectPages,
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
					'stages' => Stage::find()->where(['id_project' => $id])->all(),
        ]);
    }
	
		public function actionInfostage($id)
    {
        return $this->renderPartial('_info_object', [
					'objects' => StageGoal::find()->where(['id_stage' => $id])->all(),
				]);
    }

    public function actionInfoajax($id)
    {
        return $this->renderPartial('about', [
					'project' => Projects::findOne($id),
				]);
    }

    public function actionAll($id)
    {
			return $this->renderPartial('_view_bottom', [
				'stage' => Stage::findOne($id),
				'objects' => StageGoal::find()->where(['id_stage' => $id])->all(),
				'results' => StageResult::find()->where(['id_stage' => $id])->all(),
			]);
    }

		public function actionAddStage()
    {
			if (!Yii::$app->user->can("Scrum-master"))
				throw new ForbiddenHttpException("Доступ запрещен. Нажмите на кнопку 'Принять участие в проекте' и ожидайте ответа");

			$stage = new Stage();
			$stage->name = (Stage::find()->where(['id_project' => Yii::$app->request->post('id-project')])->count() + 1) . ' этап';
			$stage->create_at = time();
			$stage->date_begin = strtotime(Yii::$app->request->post('stage-begin'));
			$stage->date_end = strtotime(Yii::$app->request->post('stage-end'));
			$stage->id_project = intval(Yii::$app->request->post('id-project'));
			$stage->save();
    }

		public function actionAddObject()
    {
			if (!Yii::$app->user->can("Scrum-master"))
				throw new ForbiddenHttpException("Доступ запрещен. Нажмите на кнопку 'Принять участие в проекте' и ожидайте ответа");

			$stageGoal = new StageGoal();
			$stageGoal->description = Yii::$app->request->post('object-description');
			$stageGoal->value = Yii::$app->request->post('object-final-value');
			$stageGoal->create_at = time();
			$stageGoal->id_stage = intval(Yii::$app->request->post('object-stage'));
			$stageGoal->save();
    }
	
		public function actionAddResult()
    {
			if (!Yii::$app->user->can("Scrum-master"))
				throw new ForbiddenHttpException("Доступ запрещен. Нажмите на кнопку 'Принять участие в проекте' и ожидайте ответа");
			
			$stageResult = new StageResult();
			$stageResult->description = Yii::$app->request->post('stage-result-description');
			$stageResult->create_at = time();
			$stageResult->id_stage = intval(Yii::$app->request->post('result-stage'));
			$stageResult->save();
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
