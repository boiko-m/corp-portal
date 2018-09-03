<?php

use yii\db\Migration;

/**
 * Class m180831_155118_recreate_fk_in_stage_table
 */
class m180831_155118_recreate_fk_in_stage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
			$this->dropForeignKey('fk-stage-id_project','stage');
			$this->dropIndex('ifk-stage-id_project','stage');
			
			$this->createIndex(
            'ifk-stage-id_project',
            'stage',
            'id_project'
        );
        $this->addForeignKey(
            'fk-stage-id_project',
            'stage',
            'id_project',
            'projects',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180831_155118_recreate_fk_in_stage_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180831_155118_recreate_fk_in_stage_table cannot be reverted.\n";

        return false;
    }
    */
}
