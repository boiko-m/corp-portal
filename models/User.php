<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return 'corplbr.user';
    }

    public function rules()
    {
        return [
            [['username', 'email', 'auth_key'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Почта',
        ];
    }

    public function getAvatar() {
        $profile = Profile::find()->where(["id" => $this->id])->select('img')->one();
        return "http://portal.lbr.ru/img/user/thumbnail_".$profile['img'];
    }

    public function getUsername() {
        $profile = Profile::find()->where(["id" => $this->id])->select('last_name,first_name')->one();
        return $profile['first_name'] . " " . $profile['last_name'] ;
    }

    public function getUrl() {
        return "/profiles/".$this->id;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

}
