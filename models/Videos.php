<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.videos".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $link
 * @property string $img
 * @property int $id_category
 * @property int $id_user
 * @property string $date
 * @property int $comment_accept
 * @property int $youtube_views
 * @property int $right_module
 */
class Videos extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'link', 'img', 'id_category', 'id_user', 'date'], 'required'],
            [['name', 'description', 'link', 'img', 'date'], 'string'],
            [['id_category', 'id_user', 'comment_accept', 'youtube_views', 'right_module'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'link' => 'Link',
            'img' => 'Img',
            'id_category' => 'Id Category',
            'id_user' => 'Id User',
            'date' => 'Date',
            'comment_accept' => 'Comment Accept',
            'youtube_views' => 'Youtube Views',
            'right_module' => 'Right Module',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getCategory()
    {
        return $this->hasOne(VideoCategory::className(), ['id' => 'id_category']);
    }
}
