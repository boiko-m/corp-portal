<?php

use yii\db\Migration;

/**
 * Class m180712_070212_add_column_short_description_to_project_news_table
 */
class m180712_070212_add_column_short_description_to_project_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project_news', 'short_description', $this->string(250));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180712_070212_add_column_short_description_to_project_news_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180712_070212_add_column_short_description_to_project_news_table cannot be reverted.\n";

        return false;
    }
    */
}
