<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachments_message".
 *
 * @property int $id
 * @property int $date
 * @property string $name
 * @property string $link
 * @property string $type
 * @property int $id_message
 *
 * @property Messages $message
 */
class AttachmentsMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachments_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'name', 'link', 'type', 'id_message'], 'required'],
            [['date', 'id_message'], 'integer'],
            [['name', 'link'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 50],
            [['id_message'], 'exist', 'skipOnError' => true, 'targetClass' => Messages::className(), 'targetAttribute' => ['id_message' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'name' => 'Название файла',
            'link' => 'Ссылка',
            'type' => 'Тип',
            'id_message' => 'Сообщение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(Messages::className(), ['id' => 'id_message']);
    }
}
