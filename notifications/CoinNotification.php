<?php

namespace app\notifications;
use Yii;
use webzop\notifications\Notification;

class CoinNotification extends Notification
{
    const COIN_NOTIFY = 'coin_notify';
	public $userCoins;
	public $col;

    public function getTitle(){
        return Yii::t('app',sprintf("Вам начиcлены %s монеты. Всего монет %s", $this->col, $this->userCoins));
    }
}

?>