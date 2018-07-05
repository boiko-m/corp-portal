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

    public function getTitle(){
        switch($this->key){
            case self::COIN_NOTIFY:
                return Yii::t('app','Вам начислены монеты');

        }
    }

}