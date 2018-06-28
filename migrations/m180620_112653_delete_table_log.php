<?php

use yii\db\Migration;

/**
 * Class m180620_112653_delete_table_log
 */
class m180620_112653_delete_table_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('log');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180620_112653_delete_table_log cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180620_112653_delete_table_log cannot be reverted.\n";

        return false;
    }
    */
}
