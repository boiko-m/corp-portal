<?php

use yii\db\Migration;

/**
 * Class m180806_141926_addColumnProfile_visit_model_model_id
 */
class m180806_141926_addColumnProfile_visit_model_model_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'controller_visit', $this->string(50));
        $this->addColumn('profile', 'action_visit', $this->string(50));
        $this->addColumn('profile', 'id_visit', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180806_141926_addColumnProfile_visit_model_model_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180806_141926_addColumnProfile_visit_model_model_id cannot be reverted.\n";

        return false;
    }
    */
}
