<?php

use yii\db\Migration;

/**
 * Class m180414_081540_create_scripts
 */
class m180414_081540_create_scripts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;

         if ($this->db->driverName === 'mysql') {
             $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
         }

         $this->createTable('corplbr.scripts', [
             'id' => $this->primaryKey(),
             //'id' => $this->integer()->notNull(),
             //'username' => $this->string()->notNull()->unique(),
             'id_fk_scripts' => $this->integer(),
             //'auth_key' => $this->string(32)->notNull(),
             'answer' => $this->string(),
             //'password_reset_token' => $this->string()->unique(),
             'content' => $this->text(),
             'redir' => $this->string(),
             //'email' => $this->string()->notNull()->unique(),
         ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('corplbr.scripts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180414_081540_create_scripts cannot be reverted.\n";

        return false;
    }
    */
}
