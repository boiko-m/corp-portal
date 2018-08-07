<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Questionnaire;
use app\models\QuestionnaireSearch;
use app\models\Answers;
use app\models\AnswersUser;
use app\models\QuestionFilials;
use app\models\Filials;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;

/**
 * QuestionnaireController implements the CRUD actions for Questionnaire model.
 */
class QuestionnaireController extends Controller
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
     * Lists all Questionnaire models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionnaireSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Questionnaire model.
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
     * Displays a single Questionnaire model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCharts($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AnswersUser::find()->where(['id_question' => $id]),
        ]);

        return $this->render('charts', [
            'model' => $this->findModel($id),
            'answers' => Answers::find()->where(['id_question' => $id])->all(),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Questionnaire model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Questionnaire();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Questionnaire model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $answers = Answers::find()->where(['id_question' => $id])->all();
        $question_filials = QuestionFilials::find()->where(['id_question' => $id])->all();
        $filials = Filials::find()->all();

        if (Yii::$app->request->post('add_answer_variant')) {
            $answer = new Answers();
            $answer->name = Yii::$app->request->post('add_answer_variant');
            $answer->id_question = $model->id;
            $answer->save();
            return JSON::encode($answer);
        }

        if (Yii::$app->request->get('delete_answer')) {
            $answer = Answers::find()->where(['id' => Yii::$app->request->get('delete_answer')])->one();
            $answer->delete();
        }

        if (Yii::$app->request->post('add_filial')) {
            $question_filials = new QuestionFilials();
            $question_filials->id_filials = (Filials::find()->where(['name' => Yii::$app->request->post('add_filial')])->one())->id;
            $question_filials->id_question = $id;
            $question_filials->save();
            $question_filials->id_filials = (Filials::find()->where(['id' => $question_filials->id_filials])->one())->name;
            return JSON::encode($question_filials);
        }

        if (Yii::$app->request->get('delete_filial')) {
            $question_filials = QuestionFilials::find()->where(['id' => Yii::$app->request->get('delete_filial')])->one();
            $question_filials->delete();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {}

        return $this->render('update', [
            'model' => $model,
            'answers' => $answers,
            'question_filials' => $question_filials,
            'filials' => $filials,
        ]);
    }

    /**
     * Deletes an existing Questionnaire model.
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
     * Finds the Questionnaire model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Questionnaire the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questionnaire::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
