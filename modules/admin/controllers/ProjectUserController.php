<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ProjectUser;
use app\models\Projects;
use app\models\Profile;
use app\models\ProjectUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectUserController implements the CRUD actions for ProjectUser model.
 */
class ProjectUserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ProjectUser();
        $model->id_project = (Projects::findOne(['id' => $id]))->name;

        if ($model->load(Yii::$app->request->post())) {
            $model->id_project = (Projects::findOne(['name' => $model->id_project]))->id;
            $model->id_user = (Profile::find()->where('CONCAT_WS(" ", last_name, first_name, middle_name) LIKE :search')->params([':search' => '%' . $model->id_user . '%'])->one())->id;
            $model->save();
            $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->id_project = (Projects::findOne($model->id_project))->name;
        $model->id_user = (Profile::find()->select(['CONCAT_WS(" ",last_name,first_name, middle_name) as full_name'])->where(['id' => $model->id_user])->one())->full_name;

        if ($model->load(Yii::$app->request->post())) {
            $model->id_project = (Projects::findOne(['name' => $model->id_project]))->id;
            $model->id_user = (Profile::find()->where('CONCAT_WS(" ", last_name, first_name, middle_name) LIKE :search')->params([':search' => '%' . $model->id_user . '%'])->one())->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
