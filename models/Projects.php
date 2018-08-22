<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $goal
 * @property int $create_at
 * @property int $close_at
 * @property int $archive
 * @property int $create_user
 * @property int $visible
 * @property int $active
 *
 * @property ProjectNews[] $projectNews
 * @property ProjectUser[] $projectUsers
 * @property User $createUser
 * @property WantToProject[] $wantToProjects
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'create_at', 'close_at', 'create_user'], 'required'],
            [['name', 'description', 'goal', 'status'], 'string'],
            [['create_at', 'close_at', 'archive', 'create_user', 'visible', 'active', 'description_visible'], 'integer'],
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
            'goal' => 'Цель',
            'status' => 'Статус',
            'create_at' => 'Дата начала',
            'close_at' => 'Дата окончания',
            'archive' => 'Архивация',
            'create_user' => 'Создатель',
            'visible' => 'Видимость',
            'active' => 'Автивность',
            'description_visible' => 'Видимость описания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectNews()
    {
        return $this->hasMany(ProjectNews::className(), ['id_project' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['id_project' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWantToProjects()
    {
        return $this->hasMany(WantToProject::className(), ['id_project' => 'id']);
    }
}
