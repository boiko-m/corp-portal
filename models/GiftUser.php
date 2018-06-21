<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corplbr.gift_user".
 *
 * @property int $id
 * @property int $id_gift
 * @property int $id_user_from
 * @property string $date
 * @property int $anonim
 * @property string $message
 * @property int $id_user_to
 */
class GiftUser extends \yii\db\ActiveRecord
{
    public $hiddenInput;
    public $costCoin;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.gift_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id_gift','required','message'=>'Выберите подарок'],
            [[ 'id_user_from', 'date', 'anonim', 'message', 'id_user_to', ], 'required'],
            [['id_gift', 'id_user_from', 'anonim', 'id_user_to','date'], 'integer'],
            [[ 'message'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gift' => 'Id Gift',
            'id_user_from' => 'Id User From',
            'date' => 'Date',
            'anonim' => 'Anonim',
            'message' => 'Сообщение',
            'id_user_to' => 'Id User To',
        ];
    }

    public function getGift()
    {
        return $this->hasOne(Gift::className(), ['id' => 'id_gift']);
    }

    public function getUserFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_from']);
    }

    public function getUserTo()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_to']);
    }
}
