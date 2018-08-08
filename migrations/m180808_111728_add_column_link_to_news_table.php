<?php

use yii\db\Migration;

/**
 * Class m180808_111728_add_column_link_to_news_table
 */
class m180808_111728_add_column_link_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'link_project_news', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180808_111728_add_column_link_to_news_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180808_111728_add_column_link_to_news_table cannot be reverted.\n";

        return false;
    }
    */
}
