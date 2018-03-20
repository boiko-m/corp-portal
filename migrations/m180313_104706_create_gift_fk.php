<?php

use yii\db\Migration;

/**
 * Class m180313_104706_create_gift_fk
 */
class m180313_104706_create_gift_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_gift-id_user',
            'corplbr.gift',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_gift-id_user',
            'corplbr.gift',
            'id_user',
            '[corplbr].[user]',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-corplbr_gift-id_gift_type',
            'corplbr.gift',
            'id_gift_type'
        );

        $this->addForeignKey(
            'fk-corplbr_gift-id_gift_type',
            'corplbr.gift',
            'id_gift_type',
            'corplbr.gift_type',
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
            'fk-corplbr_gift-id_gift_type',
            'corplbr.gift'
        );

        $this->dropIndex(
            'idx-corplbr_gift-id_gift_type',
            'corplbr.gift'
        );

        $this->dropForeignKey(
            'fk-corplbr_gift-id_user',
            'corplbr.gift'
        );

        $this->dropIndex(
            'idx-corplbr_gift-id_user',
            'corplbr.gift'
        );
    }
}
