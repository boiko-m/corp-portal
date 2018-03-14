<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.log".
 *
 * @property int $id
 * @property string $type
 * @property string $msg
 * @property int $id_user
 * @property string $date
 * @property int $id_user_to
 */
class Log extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'msg', 'id_user', 'date'], 'required'],
            [['type', 'msg', 'date'], 'string'],
            [['id_user', 'id_user_to'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'msg' => 'Msg',
            'id_user' => 'Id User',
            'date' => 'Date',
            'id_user_to' => 'Id User To',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
