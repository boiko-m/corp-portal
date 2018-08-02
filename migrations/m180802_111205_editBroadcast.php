<?php

use yii\db\Migration;

/**
 * Class m180802_111205_editBroadcast
 */
class m180802_111205_editBroadcast extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('broadcast', 'link_only', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('broadcast', 'link_only');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180802_111205_editBroadcast cannot be reverted.\n";

        return false;
    }
    */
}
