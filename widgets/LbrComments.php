<?php

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\db\Query;
use app\assets\CommentsAsset;

class LbrComments extends \ogheo\comments\widget\Comments
{
    /**
     * @var string
     */
    public $commentsView = 'comments/comments';

    /**
     * @var string
     */
    public $commentView = 'comments/_comment';

    /**
     * @var string
     */
    public $formView = '\_form';
}
