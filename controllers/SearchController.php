<?php
/**
 * Created by PhpStorm.
 * User: okotchik
 * Date: 09.06.2018
 * Time: 16:16
 */

namespace app\controllers;

use app\models\Profile;
use app\models\ProfileMain;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;



class SearchController extends Controller
{
    public function actionIndex()
    {
        $post = Yii::$app->request->post('ProfileMain')['text'];
        $profile = Profile::find()->where('CONCAT_WS(" ",last_name,first_name) LIKE :search')->params([':search' => '%' . $post . '%'])->with('user')
            ->orWhere(['like', 'first_name',  $post])->orWhere(['like', 'last_name',  $post])->limit(10)->all();
        return $this->renderAjax('index', compact('profile', 'post'));
    }

    public function actionView()
    {

        $get = Yii::$app->request->get('ProfileSearch');

        if(Yii::$app->request->get('ProfileMain')){
          $get = Yii::$app->request->get('ProfileMain')['text'];
        }
        $profile = Profile::find()->where(['like', 'last_name',  $get])->with('user')
            ->orWhere(['like', 'first_name',  $get]);
        $countQuery = clone $profile;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $models = $profile->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('view', [
            'search' =>$get,
            'models' => $models,
            'profile' => $profile,
            'pages' => $pages,
        ]);
    }
}
