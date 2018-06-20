<?php

use yii\db\Migration;

/**
 * Class m180615_135818_create_table_setting_values
 */
class m180615_135818_create_table_setting_values extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('setting_values', [
            'id' => $this->primaryKey(),
            'value'=>$this->string(100)->notNull(),
            'id_setting_option' => $this->integer()->notNull(),
            'id_profile' => $this->integer(),
        ]);

        $this->createIndex(
            'ifk-setting_values-id_setting_option',
            'setting_values',
            'id_setting_option'
        );
        $this->addForeignKey(
            'fk-setting_values-id_setting_option',
            'setting_values',
            'id_setting_option',
            'setting_options',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-setting_values-id_profile',
            'setting_values',
            'id_profile'
        );
        $this->addForeignKey(
            'fk-setting_values-id_profile',
            'setting_values',
            'id_profile',
            'profile',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('setting_values');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180615_135818_create_table_setting_values cannot be reverted.\n";

        return false;
    }
    */
}
