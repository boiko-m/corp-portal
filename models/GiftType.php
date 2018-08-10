<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corplbr.gift_type".
 *
 * @property int $id
 * @property string $name
 * @property int $visible
 */
class GiftType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.gift_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'visible'], 'required'],
            [['name'], 'string'],
            [['visible'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'visible' => 'Видимость',
        ];
    }

    public function getGifts()
    {
        return $this->hasMany(Gift::className(), ['id_gift_type' => 'id']);
    }
}
