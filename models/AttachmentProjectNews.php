<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachment_project_news".
 *
 * @property int $id
 * @property string $link
 * @property int $type
 * @property int $create_at
 * @property int $create_user
 * @property int $id_project_news
 *
 * @property ProjectNews $projectNews
 * @property User $createUser
 */
class AttachmentProjectNews extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment_project_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
            [['link', 'name', 'type', 'create_at', 'create_user', 'id_project_news'], 'required'],
            [['type', 'create_at', 'create_user', 'id_project_news'], 'integer'],
            [['link'], 'string', 'max' => 100],
            [['id_project_news'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectNews::className(), 'targetAttribute' => ['id_project_news' => 'id']],
            [['create_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['create_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Ссылка',
            'name' => 'Название',
            'type' => 'Тип',
            'create_at' => 'Дата создания',
            'create_user' => 'Создатель',
            'id_project_news' => 'Новость проекта',
            'file' => 'Документ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectNews()
    {
        return $this->hasOne(ProjectNews::className(), ['id' => 'id_project_news']);
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
    public function getCreateProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'create_user']);
    }
}
