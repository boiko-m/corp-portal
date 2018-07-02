<?php
namespace app\notifications;

use Yii;
use webzop\notifications\Notification;

class GiftNotification extends Notification
{
    const GIFT_NOTIFY = 'gift_notify';

    /**
     * @inheritdoc
     */
    public function getTitle(){
        return Yii::t('app', 'Вам прислали подарок');
    }

    /**
     * @inheritdoc
     */
    public function getRoute(){
        return ['/profiles/view/', 'id' => $this->userId];
    }
}
