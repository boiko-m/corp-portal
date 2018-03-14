<?php

use yii\db\Migration;

/**
 * Class m180313_142621_create_add_to_admin_fk
 */
class m180313_142621_create_add_to_admin_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_add_to_admin-user_id',
            'corplbr.add_to_admin',
            'user_id'
        );

        $this->addForeignKey(
            'fk-corplbr_add_to_admin-user_id',
            'corplbr.add_to_admin',
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
            'fk-corplbr_add_to_admin-user_id',
            'corplbr.add_to_admin'
        );

        $this->dropIndex(
            'idx-corplbr_add_to_admin-user_id',
            'corplbr.add_to_admin'
        );
    }
}
