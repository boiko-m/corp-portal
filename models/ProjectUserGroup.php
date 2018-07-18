<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_user_group".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $create_at
 * @property int $create_user
 *
 * @property ProjectUser[] $projectUsers
 * @property User $createUser
 */
class ProjectUserGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_user_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_at', 'create_user'], 'required'],
            [['name', 'description'], 'string'],
            [['create_at', 'create_user'], 'integer'],
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
            'name' => 'Название',
            'description' => 'Описание',
            'create_at' => 'Дата создания',
            'create_user' => 'Создатель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['id_project_user_group' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user']);
    }
}
