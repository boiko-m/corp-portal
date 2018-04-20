<?php

use yii\db\Migration;

/**
 * Class m180420_121700_update_user
 */
class m180420_121700_update_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('user', 'dismissed', $this->boolean());
        $this->addColumn('user', 'dismissed_at', $this->integer());
        $this->addColumn('user', 'key_external', $this->string());
        $this->addColumn('user', 'password_external', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('user', 'dismissed');
        $this->dropColumn('user', 'dismissed_at');
        $this->dropColumn('user', 'key_external');
        $this->dropColumn('user', 'password_external');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180420_121700_update_user cannot be reverted.\n";

        return false;
    }
    */
}
