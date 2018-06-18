<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vote".
 *
 * @property int $id
 * @property string $entity
 * @property int $target_id
 * @property int $user_id
 * @property string $user_ip
 * @property int $value
 * @property int $created_at
 */
class Vote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity', 'target_id', 'value', 'created_at'], 'required'],
            [['entity', 'target_id', 'user_id', 'value', 'created_at'], 'integer'],
            [['user_ip'], 'string', 'max' => 39],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity' => 'Entity',
            'target_id' => 'Target ID',
            'user_id' => 'User ID',
            'user_ip' => 'User Ip',
            'value' => 'Value',
            'created_at' => 'Created At',
        ];
    }
}
