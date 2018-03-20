<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corplbr.gift".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property int $id_user
 * @property string $date
 * @property int $sum_coin
 * @property int $id_gift_type
 * @property int $visible
 */
class Gift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.gift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'id_user', 'date', 'id_gift_type'], 'required'],
            [['name', 'img', 'date'], 'string'],
            [['id_user', 'sum_coin', 'id_gift_type', 'visible'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'id_user' => 'Id User',
            'date' => 'Date',
            'sum_coin' => 'Sum Coin',
            'id_gift_type' => 'Id Gift Type',
            'visible' => 'Visible',
        ];
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
