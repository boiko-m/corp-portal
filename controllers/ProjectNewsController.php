<?php

namespace app\controllers;

use Yii;
use app\models\ProjectNews;
use app\models\AttachmentProjectNews;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectNewsController implements the CRUD actions for ProjectNews model.
 */
class ProjectNewsController extends Controller
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
     * Lists all ProjectNews models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index', [
            'news' => ProjectNews::find()->joinWith('project')->orderBy('create_at DESC')->all(),
        ]);
    }

    /**
     * Displays a single ProjectNews model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

      \Yii::$app->visit->set([
          'controller' => 'project-news',
          'action' => 'view',
          'id'=> $id
      ]);

      return $this->render('view', [
          'news' => ProjectNews::find()->where(['id' => $id])->with('project')->one(),
          'attachmentVideo' => AttachmentProjectNews::findAll(['type' => 1, 'id_project_news' => $id]),
          'attachmentDocument' => AttachmentProjectNews::findAll(['type' => 0, 'type' => 2, 'id_project_news' => $id]),
      ]);
    }

    /**
     * Creates a new ProjectNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectNews();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectNews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectNews model.
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
     * Finds the ProjectNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectNews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
