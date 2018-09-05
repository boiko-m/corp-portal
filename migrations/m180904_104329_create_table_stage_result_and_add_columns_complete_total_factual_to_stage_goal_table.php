<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_stage_result_and_add_columns_complete_total_factual_to_stage_goal`.
 */
class m180904_104329_create_table_stage_result_and_add_columns_complete_total_factual_to_stage_goal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
			$this->createTable('stage_result', [
				'id' => $this->primaryKey(),
				'description' => $this->text(),
				'create_at' => $this->integer()->notNull(),
				'id_stage' => $this->integer()->notNull(),
			]);
			$this->createIndex(
				'ifk-stage_result-id_stage',
				'stage_result',
				'id_stage'
			);
			$this->addForeignKey(
				'fk-stage_result-id_stage',
				'stage_result',
				'id_stage',
				'stage',
				'id',
				'CASCADE'
			);
			
			$this->addColumn('stage_goal', 'complete', $this->boolean()->defaultValue(false));
			$this->addColumn('stage_goal', 'total', $this->string());
			$this->addColumn('stage_goal', 'factual_value', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('table_stage_result_and_add_columns_complete_total_factual_to_stage_goal');
    }
}
