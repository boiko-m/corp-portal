<?php

namespace app\models;

use yii\db\ActiveRecord;

class GiftType extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'corplbr.gift_type';
    }

    public function getGifts()
    {
        return $this->hasMany(Gift::className(), ['id_gift_type' => 'id']);
    }
}
