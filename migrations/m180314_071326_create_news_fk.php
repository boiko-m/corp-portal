<?php

use yii\db\Migration;

/**
 * Class m180314_071326_create_news_fk
 */
class m180314_071326_create_news_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_news-id_user',
            'corplbr.news',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_news-id_user',
            'corplbr.news',
            'id_user',
            'corplbr.[user]',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-corplbr_news-id_user',
            'corplbr.news'
        );

        $this->dropIndex(
            'idx-corplbr_news-id_user',
            'corplbr.news'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_071326_create_news_fk cannot be reverted.\n";

        return false;
    }
    */
}
