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
            'idx-corplbr_gift_user-id_user_from',
            'corplbr.gift_user',
            'id_user_from'
        );

        $this->addForeignKey(
            'fk-corplbr_gift_user-id_user_from',
            'corplbr.gift_user',
            'id_user_from',
            '[corplbr].[user]',
            'id',
            'NO ACTION'
        );

        $this->createIndex(
            'idx-corplbr_gift_user-id_user_to',
            'corplbr.gift_user',
            'id_user_to'
        );

        $this->addForeignKey(
            'fk-corplbr_gift_user-id_user_to',
            'corplbr.gift_user',
            'id_user_to',
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
            'fk-corplbr_gift_user-id_user_to',
            'corplbr.gift_user'
        );

        $this->dropIndex(
            'idx-corplbr_gift_user-id_user_to',
            'corplbr.gift_user'
        );

        $this->dropForeignKey(
            'fk-corplbr_gift_user-id_user_from',
            'corplbr.gift_user'
        );

        $this->dropIndex(
            'idx-corplbr_gift_user-id_user_from',
            'corplbr.gift_user'
        );
    }
}
