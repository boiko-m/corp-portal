<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_im".
 *
 * @property int $id
 * @property string $name
 * @property int $id_type_group_im
 *
 * @property TypeGroupIm $typeGroupIm
 * @property Messages[] $messages
 */
class GroupIm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_im';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_type_group_im'], 'required'],
            [['id_type_group_im'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['id_type_group_im'], 'exist', 'skipOnError' => true, 'targetClass' => TypeGroupIm::className(), 'targetAttribute' => ['id_type_group_im' => 'id']],
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
            'id_type_group_im' => 'Тип группы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeGroupIm()
    {
        return $this->hasOne(TypeGroupIm::className(), ['id' => 'id_type_group_im']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['id_group' => 'id']);
    }
}
