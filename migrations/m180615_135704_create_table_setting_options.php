<?php

use yii\db\Migration;

/**
 * Class m180615_135704_create_table_setting_options
 */
class m180615_135704_create_table_setting_options extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('setting_options', [
            'id' => $this->primaryKey(),
            'code'=>$this->string(50)->notNull(),
            'name'=>$this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('setting_options');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180615_135704_create_table_setting_options cannot be reverted.\n";

        return false;
    }
    */
}
