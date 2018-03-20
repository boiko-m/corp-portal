<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180312_072528_create_user_table extends Migration
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

         $this->createTable('[corplbr].[user]', [
             //'id' => $this->primaryKey(),
             'id' => $this->integer()->notNull(),
             //'username' => $this->string()->notNull()->unique(),
             'username' => $this->string()->notNull(),
             //'auth_key' => $this->string(32)->notNull(),
             'auth_key' => $this->string(32),
             'password_hash' => $this->string()->notNull(),
             //'password_reset_token' => $this->string()->unique(),
             'password_reset_token' => $this->string(),
             //'email' => $this->string()->notNull()->unique(),
             'email' => $this->string()->notNull(),
             'status' => $this->smallInteger()->notNull()->defaultValue(10),
             'created_at' => $this->integer(),
             'updated_at' => $this->integer(),
         ], $tableOptions);
     }

     /**
      * {@inheritdoc}
      */
     public function down()
     {
         $this->dropTable('[corplbr].[user]');
     }
}
