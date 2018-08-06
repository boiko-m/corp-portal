<?php

use yii\db\Migration;

/**
 * Class m180803_131533_addChatBroadcast
 */
class m180803_131533_addChatBroadcast extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('chat_broadcast', [
            'id' => $this->primaryKey(),
            'id_user'=> $this->integer(),
            'id_broadcast'=>$this->integer(),
            'message' => $this->text(),
            'create_at' => $this->integer()
        ]);

        $this->createIndex(
            'ifk-chat_broadcast-id_user',
            'chat_broadcast',
            'id_user'
        );

        $this->createIndex(
            'ifk-chat_broadcast-id_broadcast',
            'chat_broadcast',
            'id_broadcast'
        );


        $this->addForeignKey(
            'fk-chat_broadcast-id_user',
            'chat_broadcast',
            'id_user',
            'user',
            'id',
            'SET NULL'
        );

        $this->addForeignKey(
            'fk-chat_broadcast-id_broadcast',
            'chat_broadcast',
            'id_broadcast',
            'broadcast',
            'id',
            'CASCADE'
        );




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180803_131533_addChatBroadcast cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180803_131533_addChatBroadcast cannot be reverted.\n";

        return false;
    }
    */
}
