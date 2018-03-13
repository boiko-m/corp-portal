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
            'idx-corplbr_gift-user_id',
            'corplbr.gift',
            'user_add'
        );

        $this->addForeignKey(
            'fk-corplbr_gift-user_id',
            'corplbr.gift',
            'user_add',
            'corplbr.[user]',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-corplbr_gift-type_gift',
            'corplbr.gift',
            'type_gift'
        );

        $this->addForeignKey(
            'fk-corplbr_gift-type_gift',
            'corplbr.gift',
            'type_gift',
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
            'fk-corplbr_gift-type_gift',
            'corplbr.gift'
        );

        $this->dropIndex(
            'idx-corplbr_gift-type_gift',
            'corplbr.gift'
        );

        $this->dropForeignKey(
            'fk-corplbr_gift-user_id',
            'corplbr.gift'
        );

        $this->dropIndex(
            'idx-corplbr_gift-user_id',
            'corplbr.gift'
        );
    }
}
