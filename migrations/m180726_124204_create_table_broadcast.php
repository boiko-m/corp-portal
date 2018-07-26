<?php

use yii\db\Migration;

/**
 * Class m180726_124204_create_table_broadcast
 */
class m180726_124204_create_table_broadcast extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('broadcast', [
            'id' => $this->primaryKey(),
            'link' => $this->string(100)->notNull(),
            'name' => $this->string(200)->notNull(),
            'description' => $this->text(),
            'create_at' => $this->integer()->notNull(),
            'close_at' => $this->integer(),
            'complete' => $this->boolean()->defaultValue(false),
            'create_user' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-broadcast-create_user',
            'broadcast',
            'create_user'
        );
        $this->addForeignKey(
            'fk-broadcast-create_user',
            'broadcast',
            'create_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180726_124204_create_table_broadcast cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180726_124204_create_table_broadcast cannot be reverted.\n";

        return false;
    }
    */
}
