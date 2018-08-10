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
    public $formView = '_form';

    /**
     * @var string
     */
    public $name_widget;

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
                'layout' => '{items}<div class="text-center">{pager}</div>',
                'options' => ['class' => 'comments-list'],
                'itemOptions' => ['class' => 'media'],
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render($this->commentView, [
                        'maxNestedLevel' => $this->maxNestedLevel,
                        'nestedLevel' => 1,
                        'widget' => $this,
                        'model' => $model,
                    ]);
                },
                'emptyText' => '',
                'pager' => [
                    'options'=>['class' => 'pagination float-left'],
                    'linkOptions' => ['class' => 'page-link'],
                    'hideOnSinglePage' => true,
                    'disabledPageCssClass' => 'page-link'
                ],
            ];
        }

        return $this->listViewConfig;
    }

    public function run() {
        $commentClass = CommentsModule::getInstance()->commentModelClass;
        $commentsCounter = $commentClass::getCommentsCounter([
            'url' => $this->url,
            'model' => $this->model,
            'model_key' => $this->model_key
        ]);

        $dataProvider = new ActiveDataProvider(
            array_merge(
                [
                    'query' => $commentClass::getComments([
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
                'model_key' => $this->model_key,
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
