<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.faq".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property int $id_user
 * @property string $date
 * @property int $id_type
 */
class Faq extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content', 'id_user', 'date', 'id_type'], 'required'],
            [['name', 'content', 'date'], 'string'],
            [['id_user', 'id_type'], 'integer'],
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
            'content' => 'Content',
            'id_user' => 'Id User',
            'date' => 'Date',
            'id_type' => 'Id Type',
        ];
    }

    public function getFaqType()
    {
        return $this->hasOne(FaqType::className(), ['id' => 'id_type']);
    }
}
