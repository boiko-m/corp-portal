<?php

namespace app\models;

use yii\db\ActiveRecord;

class AdminAccept extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return '[corplbr].[admin_accept]';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
