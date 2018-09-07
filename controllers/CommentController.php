<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\caching\TagDependency;
use ogheo\comments\models\CommentsRating;
use ogheo\comments\helpers\CommentsHelper;
use app\notifications\AnswerCommentNotification;
use ogheo\comments\models\Comments as CommentsModel;

class CommentController extends \ogheo\comments\controllers\DefaultController
{
	/**
     * Create new comment
     * @param $data
     * @return string
     */
    public function actionCreate($data)
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $comment = new CommentsModel(
                array_merge(
                    CommentsHelper::decryptData($data),
                    [
                        'scenario' => Yii::$app->user->isGuest ?
                            CommentsModel::SCENARIO_GUEST : CommentsModel::SCENARIO_USER
                    ]
                )
            );

            if (Yii::$app->user->isGuest && ($comment->username === null && $comment->email === null)) {
                $comment->username = CommentsHelper::getUsername();
                $comment->email = CommentsHelper::getEmail();
            }

            if ($comment->load(Yii::$app->request->post()) && $comment->validate()) {
                if ($comment->save()) {
                    if ($comment->username !== null && $comment->email !== null) {
                        CommentsHelper::setUsername($comment->username);
                        CommentsHelper::setEmail($comment->email);
                    }

                    TagDependency::invalidate(
                        Yii::$app->cache,
                        Url::previous(Yii::$app->controller->module->urlCacheSessionKey)
                    );

                    return [
                        'status' => 'success',
                        'message' => Yii::t('comments', 'Comment has been added successfully.')
                    ];
                }
            } else {
                return [
                    'status' => 'error',
                    'errors' => $comment->errors
                ];
            }
        }

        return [
            'status' => 'error',
            'message' => Yii::t('comments', 'Sorry, something went wrong. Please try again later.')
        ];
    }
}
