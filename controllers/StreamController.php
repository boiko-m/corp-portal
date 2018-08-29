<?php

namespace app\controllers;

use Yii;
use app\components\VideoStream;

class StreamController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $video = Yii::getAlias("@app/web/conference/Video_obucheniye_po_srokam_postavki.mp4"); 
        
        return $this->render('index',[
            'video' => $video
        ]);
    }

    /**
     * Displays Presentations
     *
     * @return string
     */


    public function actionVideo() {
        $stream = new VideoStream(Yii::getAlias("@webroot/conference/Video_obucheniye_po_srokam_postavki.mp4"));
        $stream->start();
        //$stream->start();
        return true;
    }


}
