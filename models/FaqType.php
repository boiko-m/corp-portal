<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.faq_type".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class FaqType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.faq_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string'],
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
            'description' => 'Описание',
        ];
    }

    public function getFaqList()
    {
        return $this->hasMany(Faq::className(), ['id_type' => 'id']);
    }
}
