<?php

use yii\db\Migration;

/**
 * Class m180808_050907_addTableVisit
 */
class m180808_050907_addTableVisit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('visit', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'controller' => $this->string(50),
            'action' => $this->string(50),
            'id_action' => $this->integer(),
            'count' =>  $this->integer(),
            'update_at' => $this->integer(),
        ]);

        $this->createIndex(
            'ifk-visit-id_user',
            'visit',
            'id_user'
        );
        $this->addForeignKey(
            'fk-visit-id_user',
            'visit',
            'id_user',
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
        $this->dropTable('visit');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180808_050907_addTableVisit cannot be reverted.\n";

        return false;
    }
    */
}
