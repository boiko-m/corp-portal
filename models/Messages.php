<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $message
 * @property int $visible
 * @property int $visible_all
 * @property int $read
 * @property int $is_show
 * @property int $create_at
 * @property int $update_at
 * @property int $id_group
 * @property int $id_user_from
 * @property int $id_user_to
 *
 * @property AttachmentsMessage[] $attachmentsMessages
 * @property User $userTo
 * @property ImGroups $group
 * @property User $userFrom
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'create_at', 'update_at', 'id_user_from'], 'required'],
            [['message'], 'string'],
            [['visible', 'visible_all', 'read', 'is_show', 'create_at', 'update_at', 'id_group', 'id_user_from', 'id_user_to'], 'integer'],
            [['id_user_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_to' => 'id']],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => ImGroups::className(), 'targetAttribute' => ['id_group' => 'id']],
            [['id_user_from'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_from' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Сообщение',
            'visible' => 'Видимость',
            'visible_all' => 'Видимость для всех',
            'read' => 'Прочитано',
            'is_show' => 'Отображено',
            'create_at' => 'Дата создания',
            'update_at' => 'Дата обновления',
            'id_group' => 'Группа',
            'id_user_from' => 'Отправитель',
            'id_user_to' => 'Получатель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentsMessages()
    {
        return $this->hasMany(AttachmentsMessage::className(), ['id_message' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTo()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ImGroups::className(), ['id' => 'id_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_from']);
    }
}
