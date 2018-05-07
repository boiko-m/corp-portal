<?php

use yii\db\Migration;

/**
 * Handles adding phone to table `profile`.
 */
class m180507_133238_add_phone_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'phone', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile', 'phone');
    }
}
