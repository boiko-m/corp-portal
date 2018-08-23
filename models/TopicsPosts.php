<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topics_posts".
 *
 * @property int $id
 * @property int $topic_id
 * @property string $author_id
 * @property int $message
 * @property string $date
 */
class TopicsPosts extends \yii\db\ActiveRecord
{

  public function getProjects() {
    return $this->hasOne(Projects::className(), ['id' => 'project_id']);
  }

  public function getProfile() {
    return $this->hasOne(Profile::className(), ['id' => 'author_id']);
  }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'topics_posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic_id', 'author_id', 'message'], 'required'],
            [['topic_id', 'message'], 'integer'],
            [['author_id'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic_id' => 'Topic ID',
            'author_id' => 'Author ID',
            'message' => 'Message',
            'date' => 'Date',
        ];
    }
}
