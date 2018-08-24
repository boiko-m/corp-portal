<?php

namespace ogheo\comments\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use ogheo\comments\helpers\CommentsHelper;
use ogheo\comments\Module as CommentsModule;

class Posts extends Comments {

    public static function getComments($params) {
        if ($params['model'] !== null) {
            $models = self::find()->byModel([
                'model' => $params['model'],
                'model_key' => $params['model_key']
            ])->with('author', 'ratingAggregation');
        } else {
            $models = self::find()->byUrl([
                'url' => $params['url']
            ])->with('author', 'ratingAggregation');
        }

        return $models;
    }
}
