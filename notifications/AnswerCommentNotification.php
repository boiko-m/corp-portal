<?php
namespace app\notifications;

use Yii;
use webzop\notifications\Notification;
use app\models\Profile;

class AnswerCommentNotification extends Notification {

  const COMMENT = 'comment';
  const COMMENT_FROM = 'comment_from';

  public $userCoins;
  public $col;

  public function getTitle() {
    return Yii::t('app',sprintf("  Вам начиcлены %s монеты. Всего монет %s", $this->col, $this->userCoins));
  }

}

?>
