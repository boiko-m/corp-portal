<?php

use yii\db\Migration;

/**
 * Class m180716_143339_add_column_descroption_visible_to_project_table
 */
class m180716_143339_add_column_descroption_visible_to_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('projects', 'description_visible', $this->boolean()->defaultValue(true));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180716_143339_add_column_descroption_visible_to_project_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_143339_add_column_descroption_visible_to_project_table cannot be reverted.\n";

        return false;
    }
    */
}
