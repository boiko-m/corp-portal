<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stage".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $create_at
 * @property int $date_begin
 * @property int $date_end
 * @property int $id_project
 *
 * @property Sprint[] $sprints
 * @property User $project
 * @property StageGoal[] $stageGoals
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_at', 'date_begin', 'date_end', 'id_project'], 'required'],
            [['description'], 'string'],
            [['create_at', 'date_begin', 'date_end', 'id_project'], 'integer'],
            [['name'], 'string', 'max' => 50],
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
            'name' => 'Название этапа',
            'description' => 'Описание',
            'create_at' => 'Дата создание',
            'date_begin' => "Дата начала",
            'date_end' => 'Дата конца',
            'id_project' => 'Проект',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSprints()
    {
        return $this->hasMany(Sprint::className(), ['id_stage' => 'id']);
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
    public function getStageGoals()
    {
        return $this->hasMany(StageGoal::className(), ['id_stage' => 'id']);
    }
}
