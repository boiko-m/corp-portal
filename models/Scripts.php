<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.news".
 *
 * @property int $id
 * @property string $date
 * @property string $title
 * @property string $content
 * @property int $type
 * @property string $img_icon
 * @property int $id_user
 * @property int $status
 * @property int $like_active
 */
class Scripts extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.scripts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'answer', 'id_fk_scripts', 'redir'], 'safe'],
            [['answer', 'content'], 'string'],
            [['id_fk_scripts', 'redir'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'answer' => 'Ответ на прошлый вопрос',
            'content' => 'Содержимое вопроса',
            'redir' => 'Перенаправить',
            'id_fk_scripts' => 'Зависимость',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public static function getScript($id) {
        return Scripts::find()->orderBy('id desc')->where(['id_fk_scripts' => $id])->all();
    }

    public static function getScriptTop($id) {
        $script = static::findOne(['id' => $id]);
        if (!$script['id_fk_scripts']) {
            return $script; 
        } else {
            return static::getScriptTop($script['id_fk_scripts']);
        }
    }

}
