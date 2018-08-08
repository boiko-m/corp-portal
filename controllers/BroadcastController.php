<?php

namespace app\controllers;

use Yii;
use app\models\Broadcast;
use app\models\BroadcastSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ChatBroadcast;


use app\assets\AppAsset;

/**
 * BroadcastController implements the CRUD actions for Broadcast model.
 */
class BroadcastController extends Controller
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
     * Lists all Broadcast models.
     * @return mixed
     */

    public function actionIndex()
    {
        $searchModel = new BroadcastSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'videos' => Broadcast::find()->where(['complete' => false, 'link_only' => true])->limit(4)->orderby('id desc')->all(),
            'broadcasts' => Broadcast::find()->where(['complete' => false, 'link_only' => false])->limit(4)->orderby('id desc')->all(),
        ]);
    }

    /**
     * Displays a single Broadcast model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $chat = new ChatBroadcast();

        $request = \Yii::$app->getRequest();
        if ($request->isPost && $chat->load($request->post())) {
            $chat->id_broadcast = $id;
            $chat->id_user = \Yii::$app->user->id;
            $chat->create_at = time();
            $chat->save();
        }

        

        return $this->render('view', [
            'chat' => $chat,
            'model' => $this->findModel($id),
            'message' => array_reverse(ChatBroadcast::find()->where(['id_broadcast' => $id])->orderby('id desc')->with('user.profile')->limit(25)->asArray()->all()),
        ]);
    }


    public function actionFull($id) {

        $chat = new ChatBroadcast();

        $request = \Yii::$app->getRequest();
        if ($request->isPost && $chat->load($request->post())) {
            $chat->id_broadcast = $id;
            $chat->id_user = \Yii::$app->user->id;
            $chat->create_at = time();
            $chat->save();
        }

        
        return $this->render('full', [
            'chat' => $chat,
            'model' => $this->findModel($id),
            'message' => array_reverse(ChatBroadcast::find()->where(['id_broadcast' => $id])->orderby('id desc')->with('user.profile')->limit(25)->asArray()->all()),
        ]);
    }




    public function actionChat()
    {
        $time = date('H:i:s');

        $id_broadcast = 1;

        $model = new ChatBroadcast();



        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            $model->id_broadcast = $id_broadcast;
            $model->id_user = \Yii::$app->user->id;
            $model->create_at = time();
            $model->save();
        }

        return $this->render('chat', [
            'time' => $time,
            'model' => $model,
            'message' => array_reverse(ChatBroadcast::find()->orderby('id desc')->with('user.profile')->limit(10)->asArray()->all()),
        ]);
    }


    /**
     * Creates a new Broadcast model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Broadcast();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Broadcast model.
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
     * Deletes an existing Broadcast model.
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
     * Finds the Broadcast model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Broadcast the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Broadcast::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
