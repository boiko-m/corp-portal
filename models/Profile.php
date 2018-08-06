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
    public $full_name;
    public $user_email;
    public $name_grid;
    public $department_position;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'sex', 'sip', 'coins', 'id_visit'], 'integer'],
            [['id_1c', 'first_name', 'last_name', 'middle_name', 'skype', 'phone', 'phone1', 'phone2', 'branch', 'position', 'department', 'cabinet', 'phone_cabinet', 'about', 'category', 'service', 'controller_visit', 'action_visit'], 'string'],
            [['birthday', 'date_job', 'user_email'], 'safe'],
            [['id'], 'unique'],
            [['id_profile_position'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilePosition::className(), 'targetAttribute' => ['id_profile_position' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_1c' => 'ID 1С',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'middle_name' => 'Отчество',
            'birthday' => 'Дата рождения',
            'date_job' => 'Дата устройства',
            'sex' => 'Пол',
            'skype' => 'Skype',
            'phone' => 'Телефон',
            'phone1' => 'Телефон 1',
            'phone2' => 'Телефон 2',
            'branch' => 'Филиал',
            'position' => 'Должность',
            'department' => 'Подразделение',
            'cabinet' => 'Кабинет',
            'phone_cabinet' => 'Внутренний телефон',
            'about' => 'О себе',
            'category' => 'Категория',
            'service' => 'Сервис',
            'sip' => 'SIP',
            'name' => 'ФИО',
            'grid' => 'ФИО',
            'user_email' => 'Почта',
            'department_position'=>'Отдел, должность',
            'id_profile_position' => 'Уникальный номер должности',
            'img' => 'Картинка',
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
    public function getBirthday() {

        $birthday = substr($this->birthday, 5);
        $birthday = explode('-', $birthday);
        switch ($birthday[0]) {
            case '01':
               $month = 'января';
                break;
            case  '02':
                $month = 'февраля';
                break;
            case  '03':
                $month = 'марта';
                break;
            case  '04':
                $month = 'апреля';
                break;
            case  '05':
                $month = 'мая';
                break;
            case  '06':
                $month = 'июня';
                break;
            case  '07':
                $month = 'июля';
                break;
            case  '08':
                $month = 'августа';
                break;
            case  '09':
                $month = 'сентября';
                break;
            case  '10':
                $month = 'октября';
                break;
                break;
            case  '11':
                $month = 'ноября';
                break;
                break;
            case  '12':
                $month = 'декабря';
                break;
        }
        if(substr($birthday[1],0, 1) == 0 ){
            $birthday[1] = substr($birthday[1], 1);
        }

        return $birthday[1].' '.$month;
    }

    public function getName()
    {
        return sprintf("%s %s %s", $this->last_name, $this->first_name, $this->middle_name);
    }

    public function getGrid()
    {
        $user = User::findOne($this->id);
        return  "<span style='font-size: 13px; font-weight: bold'>$user->email</span>";
    }


   public function getDepartment_position()
    {
        return sprintf("%s %s %s", $this->department,  '<br>', $this->position);
    }

    public function getImage() {

        if ($this->img) {
            $img = "/img/user/thumbnail_" . $this->img;
        }

        if (!$img or $this->img == "noimg.jpg") {
            if ($this->sex == 1) {
                $img = '/img/user/thumbnail_no-profile-m.png';
            } else {
                $img = '/img/user/thumbnail_no-profile-f.png';
            }
        }

        /*if (!$this->img_accept) { // доделать
            $img = $not_img;
            $this->img == "noimg.jpg"
        }*/
        return $img;
    }


    public function getProfilePosition()
    {
        return $this->hasOne(ProfilePosition::className(), ['id' => 'id_profile_position']);
    }

    public static function getImageStatic($id) {

        $model = Profile::findOne($id);

        if ($model->img) {
            $img = "/img/user/thumbnail_" . $model->img;
        }

        if (!$img or $model->img == "noimg.jpg") {
            if ($model->sex == 1) {
                $img = '/img/user/thumbnail_no-profile-m.png';
            } else {
                $img = '/img/user/thumbnail_no-profile-f.png';
            }
        }

        /*if (!$this->img_accept) { // доделать
            $img = $not_img;
            $this->img == "noimg.jpg"
        }*/
        return $img;
    }

}
