<?php

use yii\db\Migration;

/**
 * Class m180622_071051_create_tables_type_group_im_group_im_messages_attachments_message
 */
class m180622_071051_create_tables_type_group_im_group_im_messages_attachments_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('type_group_im', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'code' => $this->string(100)->notNull(),
        ]);


        $this->createTable('group_im', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'id_type_group_im' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-group_im-id_type_group_im',
            'group_im',
            'id_type_group_im'
        );
        $this->addForeignKey(
            'fk-group_im-id_type_group_im',
            'group_im',
            'id_type_group_im',
            'type_group_im',
            'id',
            'CASCADE'
        );


        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'visible' => $this->boolean()->defaultValue(false),
            'visible_all' => $this->boolean()->defaultValue(false),
            'read' => $this->boolean()->defaultValue(false),
            'create_at' => $this->integer()->notNull(),
            'update_at' => $this->integer()->notNull(),
            'id_group' => $this->integer(),
            'id_user_from' => $this->integer()->notNull(),
            'id_user_to' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-messages-id_group',
            'messages',
            'id_group'
        );
        $this->addForeignKey(
            'fk-messages-id_group',
            'messages',
            'id_group',
            'group_im',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-messages-id_user_from',
            'messages',
            'id_user_from'
        );
        $this->addForeignKey(
            'fk-messages-id_user_from',
            'messages',
            'id_user_from',
            'user',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-messages-id_user_to',
            'messages',
            'id_user_to'
        );
        $this->addForeignKey(
            'fk-messages-id_user_to',
            'messages',
            'id_user_to',
            'user',
            'id',
            'CASCADE'
        );


        $this->createTable('attachments_message', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'name' => $this->string(100)->notNull(),
            'link' => $this->string(100)->notNull(),
            'type' => $this->string(50)->notNull(),
            'id_message' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-attachments_message-id_message',
            'attachments_message',
            'id_message'
        );
        $this->addForeignKey(
            'fk-attachments_message-id_message',
            'attachments_message',
            'id_message',
            'messages',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180622_071051_create_tables_type_group_im_group_im_messages_attachments_message cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180622_071051_create_tables_type_group_im_group_im_messages_attachments_message cannot be reverted.\n";

        return false;
    }
    */
}
