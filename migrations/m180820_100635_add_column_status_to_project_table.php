<?php

use yii\db\Migration;

/**
 * Class m180820_100635_add_column_status_to_project_table
 */
class m180820_100635_add_column_status_to_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('projects', 'status', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180820_100635_add_column_status_to_project_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180820_100635_add_column_status_to_project_table cannot be reverted.\n";

        return false;
    }
    */
}
