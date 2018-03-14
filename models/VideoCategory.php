<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.videos_category".
 *
 * @property int $id
 * @property int $id_user
 * @property int $date
 * @property string $name_category
 * @property string $img_category
 * @property int $sort
 */
class VideoCategory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.videos_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'date', 'name_category', 'img_category', 'sort'], 'required'],
            [['id_user', 'date', 'sort'], 'integer'],
            [['name_category', 'img_category'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'date' => 'Date',
            'name_category' => 'Name Category',
            'img_category' => 'Img Category',
            'sort' => 'Sort',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
