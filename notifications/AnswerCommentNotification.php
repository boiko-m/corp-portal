<?php
namespace app\notifications;

use Yii;
use webzop\notifications\Notification;
use app\models\Profile;
use app\models\User;

class AnswerCommentNotification extends Notification {

  const COMMENT_NOTIFY = 'comment';
  const COMMENT_FROM = 'comment_from';

  public $userIdPath;
  public $userFrom;

  public function getTitle(){
      switch($this->key){
         case self::COMMENT_NOTIFY:
              return Yii::t('app', sprintf("%s ответил(a) на ваш комментарий", $this->userFrom));
     }
  }

  /**
   * @inheritdoc
   */
  public function getRoute(){
      return ['/project-forum/topic/', 'id' => $this->userIdPath];
  }

}

?>
