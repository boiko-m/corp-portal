<?php

namespace app\controllers;

use hauntd\vote\models\Vote;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\News;
use app\models\NewsSearch;
use app\models\NewsCategory;
use yii\helpers\ArrayHelper;


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
        $newsEntity = '2788134213';

        $user_id = Yii::$app->user->id;
        $like = Vote::find()->where(['user_id' => $user_id])->andWhere(['entity' =>$newsEntity])->andWhere(['target_id' =>$id])->one();
        if(isset($like)) {
            $like = 'active-like';
        } else {
            $like = '';
        }

        \Yii::$app->visit->set([
            'controller' => 'news',
            'action' => 'view',
            'id' => $id
        ]);

        $news = News::findOne($id);
        if (!is_null($news->link_project_news))
            return $this->redirect($news->link_project_news)->send();

        return $this->render('view', array(
            'news' => $news, 'like' =>$like,
        ));
    }

    public function actionIndex()
    {
        return $this->render('index', [
          'news' => News::find()->joinWith('newsCategory')->where('status <> 0')->orderBy('date DESC')->all(),
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
            'news_category' => ArrayHelper::map(NewsCategory::find()->orderBy('id')->all(), 'id', 'name'),
        ));
    }
}
