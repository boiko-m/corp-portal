<?php

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\db\Query;
use app\assets\CommentsAsset;
use yii\data\ActiveDataProvider;
use ogheo\comments\helpers\CommentsHelper;
use ogheo\comments\Module as CommentsModule;

class LbrForum extends \ogheo\comments\widget\Comments
{

    public $order = SORT_ASC;
    /**
     * @var string
     */
    public $commentsView = 'comments/posts';

    /**
     * @var string
     */
    public $commentView = 'comments/_post';

    /**
     * @var string
     */
    public $formView = '_formForum';

    /**
     * @var string
     */
    public $name_widget;

    public $project_id;

    public $formPosition = 'bottom';



    /**
     * Register assets.
     */
    public function registerAssets()
    {
        $view = $this->getView();
        CommentsAsset::register($view);
        $view->registerJs("jQuery('#{$this->wrapperId}').comment({$this->getClientOptions()});");
    }

    /**
     * @return array
     */
    public function getListViewConfig()
    {
        if ($this->listViewConfig === null) {
            $this->listViewConfig = [
                'layout' => '<div class="pagination_forum">{pager}</div>{items}<div class="pagination_forum">{pager}</div>',
                'options' => ['class' => 'comments-list posts-list'],
                'itemOptions' => ['class' => 'media'],
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render($this->commentView, [
                        'maxNestedLevel' => $this->maxNestedLevel,
                        'nestedLevel' => 1,
                        'widget' => $this,
                        'model' => $model,
                        'project_id' => $this->project_id
                    ]);
                },
                'emptyText' => '',
                'pager' => [
                    'options'=>['class' => 'pagination float-left'],
                    'linkOptions' => ['class' => 'page-link page-link-forum'],
                    'hideOnSinglePage' => true,
                    'disabledPageCssClass' => 'page-link'
                ],
            ];
        }

        return $this->listViewConfig;
    }

    public function run() {
        $commentClass = CommentsModule::getInstance()->commentModelClass;
        $commentClassPosts = 'ogheo\comments\models\Posts';
        $commentsCounter = $commentClass::getCommentsCounter([
            'url' => $this->url,
            'model' => $this->model,
            'model_key' => $this->project_id,
            'project_id' => $this->project_id
        ]);

        $dataProvider = new ActiveDataProvider(
            array_merge(
                [
                    'query' => $commentClassPosts::getComments([
                        'url' => $this->url,
                        'model' => $this->model,
                        'model_key' => $this->model_key,
                        'nestedOrder' => $this->nestedOrder,
                        'loadComments' => true
                    ])
                ], $this->getDataProviderConfig()
            )
        );

        return $this->render($this->commentsView, [
            'dataProvider' => $dataProvider,
            'commentsCounter' => $commentsCounter,
            'commentModel' => Yii::createObject($commentClass, [[
                'url' => $this->url,
                'model' => $this->model,
                'model_key' => $this->project_id,
                'email' => Yii::$app->user->isGuest ? CommentsHelper::getEmail() : null,
                'username' => Yii::$app->user->isGuest ? CommentsHelper::getUsername() : null,
                'scenario' => Yii::$app->user->isGuest ? $commentClass::SCENARIO_GUEST : $commentClass::SCENARIO_USER,
                'created_by' => Yii::$app->user->isGuest ? null : Yii::$app->user->getId()
            ]]),
            'name_widget' => $this->name_widget,
            'widget' => $this
        ]);
    }
}
