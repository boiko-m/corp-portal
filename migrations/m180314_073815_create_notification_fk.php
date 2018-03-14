<?php

use yii\db\Migration;

/**
 * Class m180314_073815_create_notification_fk
 */
class m180314_073815_create_notification_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_notification-id_user',
            'corplbr.notification',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_notification-id_user',
            'corplbr.notification',
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
            'fk-corplbr_notification-id_user',
            'corplbr.notification'
        );

        $this->dropIndex(
            'idx-corplbr_notification-id_user',
            'corplbr.notification'
        );
    }
}
