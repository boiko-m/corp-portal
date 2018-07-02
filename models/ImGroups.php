<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "im_groups".
 *
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property int $id_type_group_im
 *
 * @property ImGroupUsers[] $imGroupUsers
 * @property TypeGroupIm $typeGroupIm
 * @property Messages[] $messages
 */
class ImGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'im_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_group_im'], 'required'],
            [['id_type_group_im'], 'integer'],
            [['name', 'avatar'], 'string', 'max' => 100],
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
            'avatar' => 'Картинка',
            'id_type_group_im' => 'Тип группы',
        ];
    }


    public function getIdTypeGroup($code)
    {
        return (TypeGroupIm::find()->where(['code' => $code])->one())->id;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImGroupUsers()
    {
        return $this->hasMany(ImGroupUsers::className(), ['id_group_im' => 'id']);
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
