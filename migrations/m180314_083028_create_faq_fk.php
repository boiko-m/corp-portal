<?php

use yii\db\Migration;

/**
 * Class m180314_083028_create_faq_fk
 */
class m180314_083028_create_faq_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_faq-id_user',
            'corplbr.faq',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_faq-id_user',
            'corplbr.faq',
            'id_user',
            'corplbr.[user]',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-corplbr_faq-id_type',
            'corplbr.faq',
            'id_type'
        );

        $this->addForeignKey(
            'fk-corplbr_faq-id_type',
            'corplbr.faq',
            'id_type',
            'corplbr.faq_type',
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
            'fk-corplbr_faq-id_type',
            'corplbr.comments'
        );

        $this->dropIndex(
            'idx-corplbr_faq-id_type',
            'corplbr.comments'
        );

        $this->dropForeignKey(
            'fk-corplbr_faq-id_user',
            'corplbr.comments'
        );

        $this->dropIndex(
            'idx-corplbr_faq-id_user',
            'corplbr.comments'
        );
    }
}
