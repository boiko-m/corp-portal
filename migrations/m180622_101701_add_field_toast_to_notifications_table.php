<?php

use yii\db\Migration;

/**
 * Class m180622_101701_add_field_toast_to_notifications_table
 */
class m180622_101701_add_field_toast_to_notifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('notifications', 'toast', "tinyint(1) default 0 not null");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('notifications', 'toast');
    }
}
