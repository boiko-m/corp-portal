<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stage_result".
 *
 * @property int $id
 * @property string $description
 * @property int $create_at
 * @property int $id_stage
 *
 * @property Stage $stage
 */
class StageResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stage_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['create_at', 'id_stage'], 'required'],
            [['create_at', 'id_stage'], 'integer'],
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
            'description' => 'Description',
            'create_at' => 'Create At',
            'id_stage' => 'Id Stage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStage()
    {
        return $this->hasOne(Stage::className(), ['id' => 'id_stage']);
    }
}
