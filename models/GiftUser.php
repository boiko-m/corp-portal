<?php

namespace app\models;

use yii\db\ActiveRecord;

class GiftUser extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'corplbr.gift_user';
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
