<?php

use yii\db\Migration;

/**
 * Class m180314_125532_create_log_fk
 */
class m180314_125532_create_log_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_log-id_user',
            'corplbr.log',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_log-id_user',
            'corplbr.log',
            'id_user',
            'corplbr.[user]',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-corplbr_log-id_user_to',
            'corplbr.log',
            'id_user_to'
        );

        $this->addForeignKey(
            'fk-corplbr_log-id_user_to',
            'corplbr.log',
            'id_user_to',
            'corplbr.[user]',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-corplbr_log-id_user_to',
            'corplbr.log'
        );

        $this->dropIndex(
            'idx-corplbr_log-id_user_to',
            'corplbr.log'
        );

        $this->dropForeignKey(
            'fk-corplbr_log-id_user',
            'corplbr.log'
        );

        $this->dropIndex(
            'idx-corplbr_log-id_user',
            'corplbr.log'
        );
    }
}
