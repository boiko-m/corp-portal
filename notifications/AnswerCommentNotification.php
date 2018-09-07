z<?php
namespace app\notifications;

use Yii;
use webzop\notifications\Notification;
use app\models\Profile;

class AnswerCommentNotification extends Notification {

  const COMMENT_NOTIFY = 'comment';
  const COMMENT_FROM = 'comment_from';

  public $userIdPath;
  public $userFrom;

  public function getTitle(){
      switch($this->key){
         case self::COMMENT_NOTIFY:
              return Yii::t('app', sprintf("%s %s ответил(a) на ваш комментарий", $this->userFrom->first_name, $this->userFrom->last_name));
     }
  }

  /**
   * @inheritdoc
   */
  public function getRoute(){
      return ['/profiles/view/', 'id' => $this->userIdPath];
  }

}

?>
