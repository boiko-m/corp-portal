<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile_position".
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $decription
 *
 * @property Profile[] $profiles
 */
class ProfilePosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'integer'],
            [['name', 'decription'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'decription' => 'Decription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['id_profile_position' => 'id']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
}
