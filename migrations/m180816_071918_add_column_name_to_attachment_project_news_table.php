<?php

use yii\db\Migration;

/**
 * Class m180816_071918_add_column_name_to_attachment_project_news_table
 */
class m180816_071918_add_column_name_to_attachment_project_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('attachment_project_news', 'name', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180816_071918_add_column_name_to_attachment_project_news_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180816_071918_add_column_name_to_attachment_project_news_table cannot be reverted.\n";

        return false;
    }
    */
}
