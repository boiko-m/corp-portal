<?php
/**
 * Created by PhpStorm.
 * User: okotchik
 * Date: 05.07.2018
 * Time: 11:20
 */

namespace app\notifications;
use Yii;
use webzop\notifications\Notification;

class CoinNotification extends Notification
{
    const COIN_NOTIFY = 'coin_notify';
public $userCoins;
public $col;
    public function getTitle(){

                return Yii::t('app',sprintf("  Вам начилены %s монеты. Всего монет %s", $this->col, $this->userCoins));
        }

}