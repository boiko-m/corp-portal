<?php

use yii\db\Migration;

/**
 * Class m180710_150336_user_position
 */
class m180710_150336_user_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profile_position', [
            'id' => $this->primaryKey(),
            'code' => $this->integer(),
            'name' => $this->text(),
            'decription' => $this->text()
        ]);
        $this->addColumn('profile', 'id_profile_position', $this->integer());

        $this->createIndex(
            'ifk-profile-id_profile_position',
            'profile',
            'id_profile_position'
        );

        $this->addForeignKey(
            'fk-profile-user_position',
            'profile',
            'id_profile_position',
            'profile_position',
            'id',
            'SET NULL',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

         $this->dropIndex(
            'ifk-profile-id_profile_position',
            'profile',
            'id_profile_position'
        );
         $this->dropTable('user_position');
        $this->dropColumn('profile', 'id_profile_position');
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180710_150336_user_position cannot be reverted.\n";

        return false;
    }
    */
}
