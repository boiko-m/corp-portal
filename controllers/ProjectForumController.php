<?php

namespace app\controllers;

use Yii;
use app\models\Projects;
use app\models\ProjectNews;
use app\models\Profile;
use app\models\TopicsPosts;
use app\models\Comment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Visit;

/**
 * ProjectForumController implements the CRUD actions for Projects model.
 */
class ProjectForumController extends Controller
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
     * Lists all Projects models.
     * @return mixed
     */
    public function actionIndex() {

      $news = ProjectNews::find()->all();
      $projects = Projects::find()->all();
      foreach ($news as $new) : $ids[$new->id_project][] = $new->id; endforeach;
      foreach ($projects as $project) : $ids[$project->id]['id'] = $project->id; endforeach;

      $last_visit_time = Visit::find()->where([
                             'controller' => 'project-forum',
                             'action' => 'topic',
                             'id_user' => Yii::$app->user->id
                           ])->select('update_at, id_action')->asArray()->all();
      foreach ($last_visit_time as $visit) : $visits[$visit['id_action']] = $visit['update_at'] - 1; endforeach;

      foreach ($ids as $item) {
        // echo '<b>'.$item['id'].':'.$visits[$item['id']].'</b>-';
        $new_msgs[$item['id']] = Comment::find()->asArray()->where(['model_key' => $ids[$item['id']]])->andWhere(['>', 'created_at', $visits[$item['id']]])->orderBy('model_key DESC')->count();
      }

      return $this->render('index', [
          'projects'        => Projects::find()->where(['visible' => true])->all(),
          'visits'          => $visits,
          'new_msgs'        => $new_msgs
      ]);
    }

    public function actionTopic($id) {
      $news = ProjectNews::find()->where(['id_project' => $id])->all();
      foreach ($news as $new) : $arr[] = $new->id; endforeach;
      $arr[] = $id;

      \Yii::$app->visit->set([
          'controller' => 'project-forum',
          'action' => 'topic',
          'id'=> $id
      ]);

      return $this->render('topic', [
          'id' => $id,
          'module_keys' => $arr,
          'posts' => Comment::find()->joinWith('user')
                    ->where(['model' => ['project-news', 'project']])
                    ->andWhere(['model_key' => array_values($arr)])
                    ->orderby('id desc')
                    ->limit(10)->all(),
          'project' => Projects::findOne($id)
      ]);
    }

    /**
     * Displays a single Projects model.
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
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Projects model.
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
     * Deletes an existing Projects model.
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
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
