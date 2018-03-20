<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corplbr.profile".
 *
 * @property int $id
 * @property string $id_1c
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $birthday
 * @property string $date_job
 * @property int $sex
 * @property string $skype
 * @property string $phone1
 * @property string $phone2
 * @property string $branch
 * @property string $position
 * @property string $department
 * @property string $cabinet
 * @property string $phone_cabinet
 * @property string $about
 * @property string $category
 * @property string $service
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '[corplbr].[profile]';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'sex'], 'integer'],
            [['id_1c', 'first_name', 'last_name', 'middle_name', 'skype', 'phone1', 'phone2', 'branch', 'position', 'department', 'cabinet', 'phone_cabinet', 'about', 'category', 'service'], 'string'],
            [['birthday', 'date_job'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_1c' => 'Id 1c',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'birthday' => 'Birthday',
            'date_job' => 'Date Job',
            'sex' => 'Sex',
            'skype' => 'Skype',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'branch' => 'Branch',
            'position' => 'Position',
            'department' => 'Department',
            'cabinet' => 'Cabinet',
            'phone_cabinet' => 'Phone Cabinet',
            'about' => 'About',
            'category' => 'Category',
            'service' => 'Service',
        ];
    }
}
