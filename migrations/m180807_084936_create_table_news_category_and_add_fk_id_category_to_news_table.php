<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_news_category_and_add_fk_id_category_to_news`.
 */
class m180807_084936_create_table_news_category_and_add_fk_id_category_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'pintogram' => $this->string(200)->notNull(),
        ]);
        $this->addColumn('news', 'id_news_category', $this->integer());
        $this->createIndex(
            'ifk-news-id_news_category',
            'news',
            'id_news_category'
        );
        $this->addForeignKey(
            'fk-news-id_news_category',
            'news',
            'id_news_category',
            'news_category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('table_news_category_and_add_fk_id_category_to_news');
    }
}
