<?php

use yii\db\Migration;

/**
 * Class m180809_052719_FixForeignKey
 */
class m180809_052719_FixForeignKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropForeignKey(
            'fk-corplbr_gift-id_user',
            'gift'
        );
         $this->dropIndex(
             'fk-corplbr_gift-id_user',
             'gift'
         );

        /*$this->createIndex(
            'fk-corplbr_gift-id_user',
            'gift',
            'id_user'
        );
        $this->addForeignKey(
            'fk-corplbr_gift-id_user',
            'gift',
            'id_user',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );*/

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180809_052719_FixForeignKey cannot be reverted.\n";

        return false;
    }
    */
}
