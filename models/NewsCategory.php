<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property int $id
 * @property string $name
 * @property string $pintogram
 *
 * @property News[] $news
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'pintogram'], 'required'],
            [['name', 'pintogram'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'pintogram' => 'Пиктограмма',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['id_news_category' => 'id']);
    }
}