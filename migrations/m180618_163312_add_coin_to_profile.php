<?php

use yii\db\Migration;

/**
 * Class m180618_163312_add_coin_to_profile
 */
class m180618_163312_add_coin_to_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'coins', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile', 'coins');
    }
}


