<?php

use yii\db\Migration;

/**
 * Class m180803_103033_create_attachment_project_news
 */
class m180803_103033_create_attachment_project_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attachment_project_news', [
            'id' => $this->primaryKey(),
            'link' => $this->string(100)->notNull(),
            'type' => $this->integer()->notNull(),
            'create_at' => $this->integer()->notNull(),
            'create_user' => $this->integer()->notNull(),
            'id_project_news' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'ifk-attachment_project_news-create_user',
            'attachment_project_news',
            'create_user'
        );
        $this->addForeignKey(
            'fk-attachment_project_news-create_user',
            'attachment_project_news',
            'create_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'ifk-attachment_project_news-id_project_news',
            'attachment_project_news',
            'id_project_news'
        );
        $this->addForeignKey(
            'fk-attachment_project_news-id_project_news',
            'attachment_project_news',
            'id_project_news',
            'project_news',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180803_103033_create_attachment_project_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180803_103033_create_attachment_project_news cannot be reverted.\n";

        return false;
    }
    */
}
