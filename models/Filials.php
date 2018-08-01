<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filials".
 *
 * @property int $id
 * @property string $name
 * @property string $id1C
 * @property int $external
 *
 * @property QuestionFilials[] $questionFilials
 */
class Filials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id1C', 'external'], 'required'],
            [['external'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['id1C'], 'string', 'max' => 5],
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
            'id1C' => '1C код',
            'external' => 'Экстернал ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionFilials()
    {
        return $this->hasMany(QuestionFilials::className(), ['id_filials' => 'id']);
    }
}
