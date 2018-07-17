<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_user".
 *
 * @property int $id
 * @property int $id_project
 * @property int $id_user
 * @property int $id_project_user_group
 * @property int $create_at
 *
 * @property Projects $project
 * @property ProjectUserGroup $projectUserGroup
 * @property User $user
 */
class ProjectUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_user', 'id_project_user_group', 'create_at'], 'required'],
            [['id_project', 'id_user', 'id_project_user_group', 'create_at'], 'integer'],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['id_project' => 'id']],
            [['id_project_user_group'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectUserGroup::className(), 'targetAttribute' => ['id_project_user_group' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_project' => 'Проект',
            'id_user' => 'Пользователь',
            'id_project_user_group' => 'Назначение',
            'create_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUserGroup()
    {
        return $this->hasOne(ProjectUserGroup::className(), ['id' => 'id_project_user_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
