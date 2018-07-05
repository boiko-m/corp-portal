<?php

use yii\db\Migration;

/**
 * Class m180618_163312_add_coin_to_profile
 */
class m180704_084936_add_last_coin_to_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'last_coin', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile', 'last_coin');
    }
}


