<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stage_goal".
 *
 * @property int $id
 * @property string $description
 * @property int $value
 * @property int $create_at
 * @property int $id_stage
 *
 * @property Stage $stage
 * @property StageGoalGo[] $stageGoalGos
 */
class StageGoal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stage_goal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'value', 'create_at', 'id_stage'], 'required'],
            [['description', 'total'], 'string'],
            [['value', 'create_at', 'id_stage', 'complete', 'factual_value'], 'integer'],
            [['id_stage'], 'exist', 'skipOnError' => true, 'targetClass' => Stage::className(), 'targetAttribute' => ['id_stage' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
					'id' => 'ID',
					'description' => 'Описание',
					'value' => 'Запланированное значение',
					'factual_value' => 'Фактическое значение',
					'create_at' => 'Дата создания',
					'complete' => 'Завершенность',
					'total' => 'Итог по цели',			
					'id_stage' => 'Этап',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStage()
    {
        return $this->hasOne(Stage::className(), ['id' => 'id_stage']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStageGoalGos()
    {
        return $this->hasMany(StageGoalGo::className(), ['id_stage_goal' => 'id']);
    }
}
