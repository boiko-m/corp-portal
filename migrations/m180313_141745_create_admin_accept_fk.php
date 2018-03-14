<?php

use yii\db\Migration;

/**
 * Class m180313_141745_create_admin_accept_fk
 */
class m180313_141745_create_admin_accept_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_admin_accept-user_id',
            'corplbr.admin_accept',
            'user_id'
        );

        $this->addForeignKey(
            'fk-corplbr_admin_accept-user_id',
            'corplbr.admin_accept',
            'user_id',
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
            'fk-corplbr_admin_accept-user_id',
            'corplbr.admin_accept'
        );

        $this->dropIndex(
            'idx-corplbr_admin_accept-user_id',
            'corplbr.admin_accept'
        );
    }
}
