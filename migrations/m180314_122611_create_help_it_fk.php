<?php

use yii\db\Migration;

/**
 * Class m180314_122611_create_help_it_fk
 */
class m180314_122611_create_help_it_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_help_it-id_user',
            'corplbr.help_it',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_help_it-id_user',
            'corplbr.help_it',
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
            'fk-corplbr_help_it-id_user',
            'corplbr.help_it'
        );

        $this->dropIndex(
            'idx-corplbr_help_it-id_user',
            'corplbr.help_it'
        );
    }
}
