<?php

use yii\db\Migration;

/**
 * Class m180824_113945_add_column_visible_in_home_page_to_priject_news_table
 */
class m180824_113945_add_column_visible_in_home_page_to_priject_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project_news', 'visible_in_home_page', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180824_113945_add_column_visible_in_home_page_to_priject_news_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180824_113945_add_column_visible_in_home_page_to_priject_news_table cannot be reverted.\n";

        return false;
    }
    */
}
