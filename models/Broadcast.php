<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "broadcast".
 *
 * @property int $id
 * @property string $link
 * @property string $name
 * @property string $description
 * @property int $create_at
 * @property int $close_at
 * @property int $complete
 * @property int $create_user
 *
 * @property User $createUser
 */
class Broadcast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'broadcast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link', 'name', 'create_at', 'create_user'], 'required'],
            [['description'], 'string'],
            [['create_at', 'close_at', 'complete', 'create_user', 'link_only'], 'integer'],
            [['link'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 200],
            [['create_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['create_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Ссылка',
            'name' => 'Название',
            'description' => 'Описание',
            'create_at' => 'Дата начала',
            'close_at' => 'Дата окончания',
            'complete' => 'Окончена',
            'create_user' => 'Создатель',
            'link_only' => 'Доступ только по ссылке'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user']);
    }
}
