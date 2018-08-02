<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_filials".
 *
 * @property int $id
 * @property int $id_filials
 * @property int $id_question
 *
 * @property Filials $filials
 */
class QuestionFilials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_filials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_filials', 'id_question'], 'required'],
            [['id_filials', 'id_question'], 'integer'],
            [['id_filials'], 'exist', 'skipOnError' => true, 'targetClass' => Filials::className(), 'targetAttribute' => ['id_filials' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_filials' => 'Id Filials',
            'id_question' => 'Id Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilials()
    {
        return $this->hasOne(Filials::className(), ['id' => 'id_filials']);
    }
}
