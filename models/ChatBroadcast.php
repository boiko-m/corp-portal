<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat_broadcast".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_broadcast
 * @property string $message
 * @property int $create_at
 *
 * @property Broadcast $broadcast
 * @property User $user
 */
class ChatBroadcast extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat_broadcast';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_broadcast', 'create_at'], 'integer'],
            [['message'], 'string'],
            [['id_broadcast'], 'exist', 'skipOnError' => true, 'targetClass' => Broadcast::className(), 'targetAttribute' => ['id_broadcast' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_broadcast' => 'Id Broadcast',
            'message' => 'Message',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBroadcast()
    {
        return $this->hasOne(Broadcast::className(), ['id' => 'id_broadcast']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
