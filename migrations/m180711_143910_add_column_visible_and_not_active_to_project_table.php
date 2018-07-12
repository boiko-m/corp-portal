<?php

use yii\db\Migration;

/**
 * Class m180711_143910_add_column_visible_and_not_active_to_project_table
 */
class m180711_143910_add_column_visible_and_not_active_to_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('projects', 'visible', $this->boolean()->defaultValue(true));
        $this->addColumn('projects', 'active', $this->boolean()->defaultValue(true));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180711_143910_add_column_visible_and_not_active_to_project_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180711_143910_add_column_visible_and_not_active_to_project_table cannot be reverted.\n";

        return false;
    }
    */
}
