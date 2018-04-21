<?php

namespace app\controllers;
use app\models\Videos;
use app\models\VideoCategory;
use app\models\Comment;


class VideoController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$category = VideoCategory::find()->all();
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
    public function actionAllvideo() {
    	$data = Videos::find()->orderby('id desc')->all();
    	return $this->renderPartial('allvideo', array(
    		'data' => $data,
    	));
    }
    public function actionForum() {
    	$comments = Comment::find()->where(['model' => 'video'])->orderby('id desc')->all();

    	return $this->renderPartial('forum', array(
    		'comments' => $comments,
    	));
    }

}
