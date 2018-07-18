<?php

use yii\db\Migration;

/**
 * Class m180718_113250_add_column_visible_to_project_news_table
 */
class m180718_113250_add_column_visible_to_project_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project_news', 'visible', $this->boolean()->defaultValue(true));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_113250_add_column_visible_to_project_news_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_113250_add_column_visible_to_project_news_table cannot be reverted.\n";

        return false;
    }
    */
}
