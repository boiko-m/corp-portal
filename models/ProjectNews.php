<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

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
            [['create_at', 'create_user', 'id_project', 'visible'], 'integer'],
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
            'visible' => 'Видимость новости'
        ];
    }

    public function beforeSave($insert) {
        // open image
        try {
            $image = Image::getImagine()->open($this->image->tempName);
        } catch (\Exception $exception) { 
            return parent::beforeSave($insert);
       }

        // rendering information about crop of ONE option 
        $cropInfo = Json::decode($this->crop_info)[0];
        $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
        $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
        $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
        $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y

        //delete old images
        $oldImages = FileHelper::findFiles(Yii::getAlias('@app/web/img/project-news'), [
            'only' => [
                $this->id . '.*',
                'thumb_' . $this->id . '.*',
            ], 
        ]);
        for ($i = 0; $i != count($oldImages); $i++) {
            @unlink($oldImages[$i]);
        }

        //saving thumbnail
        $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
        $cropSizeThumb = new Box(200, 200); //frame size of crop
        $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
        $pathThumbImage = Yii::getAlias('@app/web/img/project-news/');
        $nameImage .= 'thumb_' . time() . '.' . $this->image->getExtension();
        $pathThumbImage .= $nameImage;

        $image->resize($newSizeThumb)
            ->crop($cropPointThumb, $cropSizeThumb)
            ->save($pathThumbImage, ['quality' => 100]);

        $this->avatar = $nameImage;
        return parent::beforeSave($insert);
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
