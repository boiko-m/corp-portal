<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property int $expire
 * @property string $data
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'expire'], 'integer'],
            [['data'], 'string'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'expire' => 'Expire',
            'data' => 'Data',
        ];
    }
    public static function getOnline() {
        $users_online = static::find()->groupby("user_id")->all();
        foreach ($users_online as $user_online) {
            if ($user_online['user_id']) {
                $result_to[] = static::find()->where("user_id = " . $user_online['user_id'] . " and expire > " . time() - 60*2)->orderby("expire desc")->one();
                
            }
        }
        if ($result_to) {
            foreach ($result_to as $res) {
                $users[] = $res['user_id'];
            }

            $result = Profile::findAll($users);
        }
        return $result;
    }
     public static function getOnlineUser($id) {
        $res = static::find()->where(["user_id" => $id])->orderby("expire desc")->one();
        return $res;
     }
}
