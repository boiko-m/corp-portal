<?php

use yii\db\Migration;

/**
 * Class m180314_075936_create_comments_fk
 */
class m180314_075936_create_comments_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_comments-id_user',
            'corplbr.comments',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_comments-id_user',
            'corplbr.comments',
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
            'fk-corplbr_comments-id_user',
            'corplbr.comments'
        );

        $this->dropIndex(
            'idx-corplbr_comments-id_user',
            'corplbr.comments'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_075936_create_comments_fk cannot be reverted.\n";

        return false;
    }
    */
}
