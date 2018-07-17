<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_news".
 *
 * @property int $id
 * @property string $avatar
 * @property string $title
 * @property string $content
 * @property int $create_at
 * @property int $create_user
 * @property int $id_project
 * @property string $short_description
 *
 * @property User $createUser
 * @property Projects $project
 */
class ProjectNews extends \yii\db\ActiveRecord
{

    public $image;
    public $crop_info;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                'image', 
                'image', 
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],
            ],
            ['crop_info', 'safe'],
            [['title', 'content', 'short_description', 'create_at', 'create_user', 'id_project'], 'required'],
            [['content'], 'string'],
            [['create_at', 'create_user', 'id_project'], 'integer'],
            [['avatar'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 150],
            [['short_description'], 'string', 'max' => 250],
            [['create_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['create_user' => 'id']],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['id_project' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'avatar' => 'Картика',
            'title' => 'Заголовок',
            'content' => 'Содержание',
            'create_at' => 'Дата создания',
            'create_user' => 'Создатель',
            'id_project' => 'Проект',
            'short_description' => 'Краткое описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'id_project']);
    }
}
