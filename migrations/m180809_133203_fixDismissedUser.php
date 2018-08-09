<?php

use yii\db\Migration;

/**
 * Class m180809_133203_fixDismissedUser
 */
class m180809_133203_fixDismissedUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('user', 'dismissed_at');
        $this->addColumn('profile', 'dismissed', $this->integer());
        $this->addColumn('profile', 'dismissed_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180809_133203_fixDismissedUser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180809_133203_fixDismissedUser cannot be reverted.\n";

        return false;
    }
    */
}
