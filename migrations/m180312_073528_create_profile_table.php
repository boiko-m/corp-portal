<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 */
class m180312_073528_create_profile_table extends Migration
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

         $this->createTable('[corplbr].[profile]', [
             //'id' => $this->primaryKey(),
             'id' => $this->integer()->notNull(),
             'id_1c' => $this->string(),
             'first_name' => $this->string(),
             'last_name' => $this->string(),
             'middle_name' => $this->string(),
             'birthday' => $this->date(),
             'date_job' => $this->date(),
             'sex' => $this->integer(),
             'skype' => $this->string(),
             'phone1' => $this->string(),
             'phone2' => $this->string(),
             'branch' => $this->string(),
             'position' => $this->string(),
             'department' => $this->string(),
             'cabinet' => $this->string(),
             'phone_cabinet' => $this->string(),
             'about' => $this->text(),
             'category' => $this->string(),
             'service' => $this->string()


         ], $tableOptions);

     }

     /**
      * {@inheritdoc}
      */
     public function down()
     {
         $this->dropTable('[corplbr].[profile]');
     }
}
