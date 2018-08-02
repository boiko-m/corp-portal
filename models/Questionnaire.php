<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questionnaire".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $type
 * @property int $create_at
 * @property int $create_user
 *
 * @property Answers[] $answers
 * @property User $createUser
 */
class Questionnaire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questionnaire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_at', 'create_user'], 'required'],
            [['description'], 'string'],
            [['type', 'create_at', 'create_user'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'name' => 'Вопрос',
            'description' => 'Описание',
            'type' => 'Несколько вариантов ответа',
            'create_at' => 'Дата создания',
            'create_user' => 'Создатель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['id_question' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user']);
    }
}
