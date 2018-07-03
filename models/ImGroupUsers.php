<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "im_group_users".
 *
 * @property int $id
 * @property int $id_group_im
 * @property int $id_user
 *
 * @property User $user
 * @property ImGroups $groupIm
 */
class ImGroupUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'im_group_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group_im', 'id_user'], 'required'],
            [['id_group_im', 'id_user'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_group_im'], 'exist', 'skipOnError' => true, 'targetClass' => ImGroups::className(), 'targetAttribute' => ['id_group_im' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group_im' => 'Группа',
            'id_user' => 'Пользователь',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'id_user'])->select('id, first_name, last_name, img');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupIm()
    {
        return $this->hasOne(ImGroups::className(), ['id' => 'id_group_im']);
    }
}
