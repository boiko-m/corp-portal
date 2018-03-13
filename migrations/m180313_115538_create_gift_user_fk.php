<?php

use yii\db\Migration;

/**
 * Class m180313_115538_create_gift_user_fk
 */
class m180313_115538_create_gift_user_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_gift_user-id_user',
            'corplbr.gift_user',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_gift_user-id_user',
            'corplbr.gift_user',
            'id_user',
            '[corplbr].[user]',
            'id',
            'NO ACTION'
        );

        $this->createIndex(
            'idx-corplbr_gift_user-giftto',
            'corplbr.gift_user',
            'giftto'
        );

        $this->addForeignKey(
            'fk-corplbr_gift_user-giftto',
            'corplbr.gift_user',
            'giftto',
            '[corplbr].[user]',
            'id',
            'NO ACTION'
        );

        $this->createIndex(
            'idx-corplbr_gift_user-id_gift',
            'corplbr.gift_user',
            'id_gift'
        );

        $this->addForeignKey(
            'fk-corplbr_gift_user-id_gift',
            'corplbr.gift_user',
            'id_gift',
            '[corplbr].[gift]',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-corplbr_gift_user-id_gift',
            'corplbr.gift_user'
        );

        $this->dropIndex(
            'idx-corplbr_gift_user-id_gift',
            'corplbr.gift_user'
        );

        $this->dropForeignKey(
            'fk-corplbr_gift_user-giftto',
            'corplbr.gift_user'
        );

        $this->dropIndex(
            'idx-corplbr_gift_user-giftto',
            'corplbr.gift_user'
        );

        $this->dropForeignKey(
            'fk-corplbr_gift_user-id_user',
            'corplbr.gift_user'
        );

        $this->dropIndex(
            'idx-corplbr_gift_user-id_user',
            'corplbr.gift_user'
        );
    }
}
