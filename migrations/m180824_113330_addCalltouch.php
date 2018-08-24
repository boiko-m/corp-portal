<?php

use yii\db\Migration;

/**
 * Class m180824_113330_addCalltouch
 */
class m180824_113330_addCalltouch extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calltouch', [
            'id' => $this->primaryKey(),
            'id_calltouch' => $this->integer(),
            'id_user' => $this->integer(),
            'ctCallerId' => $this->integer(),
            'callerphone' => $this->string(20),
            'phonenumber' => $this->string(20),
            'duration' =>  $this->integer(),
            'waiting_time' => $this->integer(),
            'timestamp' => $this->integer(),
            'calltime' => $this->string(100),
            'callback' => $this->string(40),
            'pool' => $this->string(20),
            'source' => $this->string(100),
            'medium' => $this->string(100),
            'utm_source' => $this->string(100),
            'utm_medium' => $this->string(100),
            'utm_campaign' => $this->string(100),
            'utm_content' => $this->string(100),
            'utm_term' => $this->string(100),
            'city' => $this->string(100),
            'device' => $this->string(100),
            'ip' => $this->string(100),
            'reclink' => $this->string(200),
        ]);

         $this->createIndex(
            'ifk-calltouch-user',
            'calltouch',
            'id_user'
        );

        $this->addForeignKey(
            'fk-calltouch-user',
            'calltouch',
            'id_user',
            'user',
            'id',
            'CASCADE',
            'SET NULL'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180824_113330_addCalltouch cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()56еен55555555555555555
    {

    }

    public function down()
    {
        echo "m180824_113330_addCalltouch cannot be reverted.\n";

        return false;
    }
    */
}
