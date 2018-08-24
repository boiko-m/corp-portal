<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calltouch".
 *
 * @property int $id
 * @property int $id_calltouch
 * @property int $id_user
 * @property int $ctCallerId
 * @property string $callerphone
 * @property string $phonenumber
 * @property int $duration
 * @property int $waiting_time
 * @property int $timestamp
 * @property string $calltime
 * @property string $callback
 * @property string $pool
 * @property string $source
 * @property string $medium
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_campaign
 * @property string $utm_content
 * @property string $utm_term
 * @property string $city
 * @property string $device
 * @property string $ip
 *
 * @property User $user
 */
class Calltouch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calltouch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_calltouch', 'id_user', 'ctCallerId', 'duration', 'waiting_time', 'timestamp'], 'integer'],
            [['callerphone', 'phonenumber', 'callback', 'pool'], 'string', 'max' => 20],
            [['calltime', 'source', 'medium', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'city', 'device', 'ip'], 'string', 'max' => 100],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_calltouch' => 'Id Calltouch',
            'id_user' => 'Id User',
            'ctCallerId' => 'Ct Caller ID',
            'callerphone' => 'Callerphone',
            'phonenumber' => 'Phonenumber',
            'duration' => 'Duration',
            'waiting_time' => 'Waiting Time',
            'timestamp' => 'Timestamp',
            'calltime' => 'Calltime',
            'callback' => 'Callback',
            'pool' => 'Pool',
            'source' => 'Source',
            'medium' => 'Medium',
            'utm_source' => 'Utm Source',
            'utm_medium' => 'Utm Medium',
            'utm_campaign' => 'Utm Campaign',
            'utm_content' => 'Utm Content',
            'utm_term' => 'Utm Term',
            'city' => 'City',
            'device' => 'Device',
            'ip' => 'Ip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
