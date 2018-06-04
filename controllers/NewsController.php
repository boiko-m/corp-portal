<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\News;
use app\models\NewsSearch;


class NewsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    public function actionView($id) {
        return $this->render('view', array(
            'news' => News::findOne($id)
        ));
    }

    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['date' => 'DESC']];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOffer() {
        $model = new News();
        $model->date = strval(date_timestamp_get(date_create()));
        $model->id_user = Yii::$app->user->id;
        $model->type = 0;
        $model->img_icon = '/img/gift/VAUPWTE.jpg';
        $model->status = 0;
        $model->like_active = 0;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/index']);
        }

        return $this->render('offer', array(
            'model' => $model,
        ));
    }
}
