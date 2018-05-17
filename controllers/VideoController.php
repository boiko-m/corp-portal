<?php

namespace app\controllers;
use app\models\Videos;
use app\models\VideoCategory;
use app\models\Comment;


class VideoController extends \yii\web\Controller
{
    public function actionIndex($ajax = "N")
    {
    	$category = VideoCategory::find()->all();
        if($ajax == "Y") {
            return $this->renderPartial('index', array(
        		'category' => $category
        	));
        }
        return $this->render('index', array(
        	'category' => $category
        ));
    }
    public function actionId($id) {
    	$video = Videos::findOne($id);
    	return $this->render('view', array(
    		'data' => $video,
    	));
    }
    public function actionAllvideo($id = 0) {
    	$data = Videos::find()->orderby('id desc');
        if($id > 0) {
            $data->where(['id_category' => $id]);
        }
    	return $this->renderPartial('allvideo', array(
    		'data' => $data->all(),
    	));
    }
    public function actionForum() {
    	$comments = Comment::find()->where(['model' => 'video'])->orderby('id desc')->all();

    	return $this->renderPartial('forum', array(
    		'comments' => $comments,
    	));
    }

}
