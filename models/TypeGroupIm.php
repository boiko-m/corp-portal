<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_group_im".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property GroupIm[] $groupIms
 */
class TypeGroupIm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_group_im';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'code' => 'Код',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupIms()
    {
        return $this->hasMany(GroupIm::className(), ['id_type_group_im' => 'id']);
    }
}
