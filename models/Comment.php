<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $url
 * @property string $model
 * @property string $model_key
 * @property int $main_parent_id
 * @property int $parent_id
 * @property string $email
 * @property string $username
 * @property string $content
 * @property string $language
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property string $ip
 * @property int $status                  0-pending,                 1-published,                 2-spam             
 *
 * @property CommentsRating[] $commentsRatings
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_parent_id', 'parent_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'status'], 'integer'],
            [['content'], 'string'],
            [['url'], 'string', 'max' => 255],
            [['model', 'model_key'], 'string', 'max' => 64],
            [['email', 'username'], 'string', 'max' => 128],
            [['language'], 'string', 'max' => 10],
            [['ip'], 'string', 'max' => 46],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'model' => 'Model',
            'model_key' => 'Model Key',
            'main_parent_id' => 'Main Parent ID',
            'parent_id' => 'Parent ID',
            'email' => 'Email',
            'username' => 'Username',
            'content' => 'Content',
            'language' => 'Language',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ip' => 'Ip',
            'status' => '
                0-pending,
                1-published,
                2-spam
            ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentsRatings()
    {
        return $this->hasMany(CommentsRating::className(), ['comment_id' => 'id']);
    }
}
