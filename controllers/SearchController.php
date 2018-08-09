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
        $name = explode(' ',$post);

        $or = ($name[1]) ? 'and' : 'or';
        $name[1] = ($name[1]) ? $name[1] : $name[0];

        $profile = Profile::find()->where('((first_name LIKE "%'.$name[0].'%" '.$or.' last_name LIKE "%'.$name[1].'%") or (first_name LIKE "%'.$name[1].'%" '.$or.' last_name LIKE "%'.$name[0].'%"))')->andWhere(['dismissed' => null])->limit(10)->all();
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
