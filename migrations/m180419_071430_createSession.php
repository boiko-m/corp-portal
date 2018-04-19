<?php

use yii\db\Migration;

/**
 * Class m180419_071430_createSession
 */
class m180419_071430_createSession extends Migration
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

         $this->createTable('session', [
             'id' => $this->primaryKey(),
             'user_id' => $this->integer(),
             'ip' => $this->string(),
             'expire' => $this->integer(),
             'data' => $this->text(),
             


         ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('session');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180419_071430_createSession cannot be reverted.\n";

        return false;
    }
    */
}
