<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.comments".
 *
 * @property int $id
 * @property int $id_user
 * @property int $fk_id
 * @property string $type_fk
 * @property string $title
 * @property string $content
 * @property string $dates
 * @property int $visible
 * @property int $admin_accept
 * @property int $id_comment_to
 */
class Comments extends ActiveRecord
{
    const VISIBLE_INACTIVE = 0;
    const VISIBLE_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'fk_id', 'type_fk', 'title', 'content', 'dates', 'visible', 'admin_accept'], 'required'],
            [['id_user', 'fk_id', 'visible', 'admin_accept', 'id_comment_to'], 'integer'],
            [['type_fk', 'title', 'content', 'dates'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'fk_id' => 'Fk ID',
            'type_fk' => 'Type Fk',
            'title' => 'Title',
            'content' => 'Content',
            'dates' => 'Dates',
            'visible' => 'Visible',
            'admin_accept' => 'Admin Accept',
            'id_comment_to' => 'Id Comment To',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getPost()
    {
        if ($this->type_fk == "faq" || $this->type_fk == "training") {
            return $this->hasOne(Faq::className(), ['id' => 'fk_id']);
        } elseif ($this->type_fk == "videos") {
            return $this->hasOne(Videos::className(), ['id' => 'fk_id']);
        }
    }

    public function getParentComment()
    {
        return $this->hasOne(Comments::className(), ['id' => 'id_comment_to']);
    }

    public function getChildComments()
    {
        return $this->hasMany(Comments::className(), ['id_comment_to' => 'id']);
    }
}
