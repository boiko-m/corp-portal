<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting_values".
 *
 * @property int $id
 * @property string $value
 * @property int $id_setting_option
 * @property int $id_profile
 *
 * @property Profile $profile
 * @property SettingOptions $settingOption
 */
class SettingValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_setting_option'], 'required'],
            [['id_setting_option', 'id_profile'], 'integer'],
            [['value'], 'string', 'max' => 100],
            [['id_profile'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['id_profile' => 'id']],
            [['id_setting_option'], 'exist', 'skipOnError' => true, 'targetClass' => SettingOptions::className(), 'targetAttribute' => ['id_setting_option' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'id_setting_option' => 'Id Setting Option',
            'id_profile' => 'Id Profile',
        ];
    }

    public function getName($code)
    {
        return (SettingOptions::find()->where(['code' => $code])->one())->name;
    }

    public function newValue($code, $value)
    {
        $settingOptionsId = SettingOptions::find()->where(['code' => $code])->one();
        $settingValue = new SettingValues();
        $settingValue->value = $value;
        $settingValue->id_setting_option = $settingOptionsId->id;
        $settingValue->id_profile = Yii::$app->user->id;
        $settingValue->save();
    }

    /**
     * @return boolean
     */
    public function isValue($code)
    {
        $settingOptionsId = SettingOptions::find()->where(['code' => $code])->one();
        if (!isset($settingOptionsId)) {
            $setting = new SettingOptions;
            $setting->code = $code;
            $setting->name = "Новая опция";
            if ($setting->save()) {
                $settingOptionsId = $setting;
            } 
        }
        if (!empty(SettingValues::find()->where(['id_profile' => Yii::$app->user->id, 'id_setting_option' => $settingOptionsId->id])->one())) {
            return 1;
        } else {
            return 0;
        }
    }

    public function setValue($code, $value)
    {
        $settingOptionsId = SettingOptions::find()->where(['code' => $code])->one();
        $settingValue = SettingValues::find()->where(['id_profile' => Yii::$app->user->id, 'id_setting_option' => $settingOptionsId->id])->one();
        $settingValue->value = $value;
        $settingValue->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValue($code)
    {
        $settingOptionsId = SettingOptions::find()->where(['code' => $code])->one();
        return (SettingValues::find()->where(['id_profile' => Yii::$app->user->id, 'id_setting_option' => $settingOptionsId->id])->one())->value;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'id_profile']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettingOption()
    {
        return $this->hasOne(SettingOptions::className(), ['id' => 'id_setting_option']);
    }
}
