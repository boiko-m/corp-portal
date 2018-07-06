<?php

namespace app\modules\conversation\controllers;

use Yii;
use app\models\Profile;
use app\models\ImGroups;
use app\models\ImGroupUsers;
use app\models\Messages;
use yii\web\Controller;
use yii\helpers\Json;

class DialogController extends \yii\web\Controller
{
    public function actionSearchEmployees()
    {
        $textSearch = Yii::$app->request->get('text');
        $profiles = Profile::find()->orFilterWhere(['OR',
                ['like', 'first_name',  $textSearch],
                ['like', 'last_name',  $textSearch],
            ])->all();
        return JSON::encode($profiles);
    }

    public function actionChooseDialog()
    {
        $id_type = ImGroups::getIdTypeGroup('private');
        if ($this->isGroupExist(Yii::$app->request->get('id')) == 0) {
            return 0;
        } else {
            $id_group = $this->isGroupExist(Yii::$app->request->get('id'));
            $messages = Messages::find()->select('id, message, create_at, id_user_from')->where(['id_group' => $id_group])->with('profileFrom')->orderBy('update_at')->asArray()->all();
            return JSON::encode($messages);
        }
    }

    public function actionSendMessage()
    {
        $id_type = ImGroups::getIdTypeGroup('private');
        if ($this->isGroupExist(Yii::$app->request->get('id')) == 0) {
            $imgroup = new ImGroups();
            $imgroup->id_type_group_im = 1;
            $imgroup->save();
            $this->insertGroupUser($imgroup->id, Yii::$app->user->id);
            $this->insertGroupUser($imgroup->id, Yii::$app->request->get('id'));
            $this->insertMessage(Yii::$app->request->get('message'), Yii::$app->request->get('id'), $imgroup->id);
        } else {
            $id_group = $this->isGroupExist(Yii::$app->request->get('id'));
            $this->insertMessage(Yii::$app->request->get('message'), Yii::$app->request->get('id'), $id_group);
        }
    }

    public function actionListDialogs()
    {
        $list = array();
        $list_dialog = ImGroupUsers::find()->select('id_group_im')->where(['id_user' => Yii::$app->user->id])->asArray()->all();
        foreach ($list_dialog as $key => $dialog) {
            array_push($list, ImGroupUsers::find()->select('id_user')->where(['id_group_im' => $dialog['id_group_im']])->andWhere(['!=', 'id_user', Yii::$app->user->id])->with('profile')->asArray()->all());
        }
        return JSON::encode($list);
    }




    private function insertGroupUser($id_group, $id_user) {
        $groupuserone = new ImGroupUsers();
        $groupuserone->id_group_im = $id_group;
        $groupuserone->id_user = $id_user;
        $groupuserone->save();
    }

    private function insertMessage($text, $id_user, $id_group) {
        $message = new Messages();
        $message->message = $text;
        $message->create_at = time();
        $message->update_at = time();
        $message->id_group = $id_group;
        $message->id_user_from = Yii::$app->user->id;
        $message->id_user_to = $id_user;
        $message->save();
    }

    private function isGroupExist($id_user) {
        $receiver = "(SELECT `id_group_im` FROM `im_group_users` WHERE `id_user` = " . $id_user .")";
        $sender = "(SELECT `id_group_im` FROM `im_group_users` WHERE `id_user` = " . Yii::$app->user->id . ")";
        $query = (new \yii\db\Query)->select('`gr1`.`id_group_im`')->from(['gr1' => $receiver, 'gr2' => $sender]);
        $rows = $query->all();
        $command = $query->createCommand();
        $rows = $command->queryAll();
        debug($rows);exit();
        if (!empty($id_group_my) && !empty($id_group_your)) {
            $intersect = array_intersect($id_group_your, $id_group_my);
            foreach ($intersect as $group) {
                if (\app\models\ImGroups::find()->where(['id_type_group_im' => '1'])) {
                    return $group['id_group_im'];
                }
            }
        }
        return 0;
    }

}