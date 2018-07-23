<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "want_to_project".
 *
 * @property int $id
 * @property int $complete
 * @property int $decision
 * @property int $id_user
 * @property int $id_project
 *
 * @property Projects $project
 * @property User $user
 */
class WantToProject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'want_to_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complete', 'decision', 'id_user', 'id_project'], 'integer'],
            [['id_user', 'id_project'], 'required'],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['id_project' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'complete' => 'Завершенность',
            'decision' => 'Решение',
            'id_user' => 'Сотрудник',
            'id_project' => 'Проект',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'id_user']);
    }
}
