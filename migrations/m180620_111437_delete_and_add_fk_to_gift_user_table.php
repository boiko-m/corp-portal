<?php

use yii\db\Migration;

/**
 * Class m180620_111437_delete_and_add_fk_to_gift_user_table
 */
class m180620_111437_delete_and_add_fk_to_gift_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-corplbr_gift_user-id_user_from','gift_user');
        $this->dropForeignKey('fk-corplbr_gift_user-id_user_to','gift_user');
        $this->dropColumn('gift_user', 'date');

        $this->addForeignKey(
            'fk-corplbr_gift_user-id_user_from',
            'gift_user',
            'id_user_from',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-corplbr_gift_user-id_user_to',
            'gift_user',
            'id_user_to',
            'user',
            'id',
            'CASCADE'
        );

        $this->addColumn('gift_user', 'date', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180620_111437_delete_and_add_fk_to_gift_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180620_111437_delete_and_add_fk_to_gift_user_table cannot be reverted.\n";

        return false;
    }
    */
}
