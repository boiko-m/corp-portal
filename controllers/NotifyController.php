<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;
use yii\data\Pagination;
use yii\helpers\Url;
use webzop\notifications\helpers\TimeElapsed;
use webzop\notifications\widgets\Notifications;
use webzop\notifications\controllers\DefaultController;

class NotifyController extends DefaultController {

    public function actionAll()
    {
        $userId = Yii::$app->getUser()->getId();
        $list = (new Query())
            ->from('{{%notifications}}')
            ->andWhere(['or', 'user_id = 0', 'user_id = :user_id'], [':user_id' => $userId])
            ->orderBy(['id' => SORT_DESC])
            ->all();
        $notifs = $this->prepareNotifications($list);
        $this->ajaxResponse(['list' => $notifs]);
    }

    private function prepareNotifications($list){
        $notifs = [];
        $seen = [];
        foreach($list as $notif){
            if(!$notif['seen']){
                $seen[] = $notif['id'];
            }
            $route = @unserialize($notif['route']);
            $notif['url'] = !empty($route) ? Url::to($route) : '';
            $notif['timeago'] = Yii::$app->formatter->asDate($notif['created_at'], 'php:d.m.Y H:i');
            $notifs[] = $notif;
        }

        if(!empty($seen)){
            Yii::$app->getDb()->createCommand()->update('{{%notifications}}', ['seen' => true], ['id' => $seen])->execute();
        }

        return $notifs;
    }

    public function actionToast()
    {
        $userId = Yii::$app->getUser()->getId();
        $list = (new Query())
            ->from('{{%notifications}}')
            ->andWhere(['toast' => 0])
            ->andWhere(['or', 'user_id = 0', 'user_id = :user_id'], [':user_id' => $userId])
            ->orderBy(['id' => SORT_DESC])
            ->all();
        $notifs = $this->prepareToastNotify($list);
        $this->ajaxResponse(['list' => $notifs]);
    }

    private function prepareToastNotify($list){
        $notifs = [];
        $toast = [];
        foreach($list as $notif) {
            if(!$notif['toast']) {
                $toast[] = $notif['id'];
            }
            $notifs[] = $notif;
        }
        if(!empty($toast)){
            Yii::$app->getDb()->createCommand()->update('{{%notifications}}', ['toast' => true], ['id' => $toast])->execute();
        }

        return $notifs;
    }
}
