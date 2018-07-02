<?php
namespace app\notifications;

use Yii;
use webzop\notifications\Notification;
use app\models\Profile;

class GiftNotification extends Notification
{
    const GIFT_NOTIFY = 'gift_notify';
    const GIFT_NOTIFY_FROM = 'gift_notify_from';

    public $userIdPath;
    public $userFrom;

    /**
     * @inheritdoc
     */
    public function getTitle(){
        switch($this->key){
           case self::GIFT_NOTIFY:
                return Yii::t('app', sprintf("%s %s прислал(a) Вам подарок", $this->userFrom->first_name, $this->userFrom->last_name));
           case self::GIFT_NOTIFY_FROM:
                return Yii::t('app', 'Вы отправили подарок');
       }
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){
        return ['/profiles/view/', 'id' => $this->userIdPath];
    }
}
