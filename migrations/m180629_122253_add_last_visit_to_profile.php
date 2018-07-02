<?php

use yii\db\Migration;

/**
 * Class m180618_163312_add_coin_to_profile
 */
class m180629_122253_add_last_visit_to_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'last_visit', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile', 'last_visit');
    }
}


