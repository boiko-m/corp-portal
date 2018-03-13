<?php

namespace app\models;

use yii\db\ActiveRecord;

class Gift extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'corplbr.gift';
    }

    public function getGiftType()
    {
        return $this->hasOne(GiftType::className(), ['id' => 'id_gift_type']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
