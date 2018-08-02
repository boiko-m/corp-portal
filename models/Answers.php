<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property string $name
 * @property int $sort
 * @property int $type
 * @property int $id_question
 *
 * @property Questionnaire $question
 * @property AnswersUser[] $answersUsers
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_question'], 'required'],
            [['sort', 'type', 'id_question'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['id_question'], 'exist', 'skipOnError' => true, 'targetClass' => Questionnaire::className(), 'targetAttribute' => ['id_question' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sort' => 'Sort',
            'type' => 'Type',
            'id_question' => 'Id Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Questionnaire::className(), ['id' => 'id_question']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswersUsers()
    {
        return $this->hasMany(AnswersUser::className(), ['id_answer' => 'id']);
    }
}
