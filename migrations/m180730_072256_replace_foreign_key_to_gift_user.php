<?php

use yii\db\Migration;

/**
 * Class m180730_072256_replace_foreign_key_to_gift_user
 */
class m180730_072256_replace_foreign_key_to_gift_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropForeignKey(
            'fk-corplbr_gift_user-id_gift',
            'gift_user'
        );
        $this->dropIndex(
            'fk-corplbr_gift_user-id_gift',
            'gift_user'
        );

        $this->createIndex(
            'fk-corplbr_gift_user-id_gift',
            'gift_user',
            'id_gift'
        );
        $this->addForeignKey(
            'fk-corplbr_gift_user-id_gift',
            'gift_user',
            'id_gift',
            'gift',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180730_072256_replace_foreign_key_to_gift_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180730_072256_replace_foreign_key_to_gift_user cannot be reverted.\n";

        return false;
    }
    */
}
