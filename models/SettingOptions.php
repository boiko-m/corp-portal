<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting_options".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property SettingValues[] $settingValues
 */
class SettingOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code', 'name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettingValues()
    {
        return $this->hasMany(SettingValues::className(), ['id_setting_option' => 'id']);
    }
}
