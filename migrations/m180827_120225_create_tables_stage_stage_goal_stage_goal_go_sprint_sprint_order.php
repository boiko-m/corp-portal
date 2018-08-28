<?php

use yii\db\Migration;

/**
 * Class m180827_120225_create_tables_stage_stage_goal_stage_goal_go_sprint_sprint_order
 */
class m180827_120225_create_tables_stage_stage_goal_stage_goal_go_sprint_sprint_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stage', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'create_at' => $this->integer()->notNull(),
            'date_begin' => $this->integer()->notNull(),
            'date_end' => $this->integer()->notNull(),
            'id_project' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-stage-id_project',
            'stage',
            'id_project'
        );
        $this->addForeignKey(
            'fk-stage-id_project',
            'stage',
            'id_project',
            'user',
            'id',
            'CASCADE'
        );


        $this->createTable('stage_goal', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->notNull(),
            'value' => $this->integer()->notNull(),
            'create_at' => $this->integer()->notNull(),
            'id_stage' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-stage_goal-id_stage',
            'stage_goal',
            'id_stage'
        );
        $this->addForeignKey(
            'fk-stage_goal-id_stage',
            'stage_goal',
            'id_stage',
            'stage',
            'id',
            'CASCADE'
        );


        $this->createTable('sprint', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'create_at' => $this->integer()->notNull(),
            'date_begin' => $this->integer()->notNull(),
            'date_end' => $this->integer()->notNull(),
            'id_stage' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-sprint-id_stage',
            'sprint',
            'id_stage'
        );
        $this->addForeignKey(
            'fk-sprint-id_stage',
            'sprint',
            'id_stage',
            'stage',
            'id',
            'CASCADE'
        );


        $this->createTable('stage_goal_go', [
            'id' => $this->primaryKey(),
            'value' => $this->integer()->notNull(),
            'create_at' => $this->integer()->notNull(),
            'id_stage_goal' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'id_sprint' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-stage_goal_go-id_stage_goal',
            'stage_goal_go',
            'id_stage_goal'
        );
        $this->addForeignKey(
            'fk-stage_goal_go-id_stage_goal',
            'stage_goal_go',
            'id_stage_goal',
            'stage_goal',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-stage_goal_go-id_user',
            'stage_goal_go',
            'id_user'
        );
        $this->addForeignKey(
            'fk-stage_goal_go-id_user',
            'stage_goal_go',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-stage_goal_go-id_sprint',
            'stage_goal_go',
            'id_sprint'
        );
        $this->addForeignKey(
            'fk-stage_goal_go-id_sprint',
            'stage_goal_go',
            'id_sprint',
            'sprint',
            'id',
            'CASCADE'
        );


        $this->createTable('sprint_order', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->text(),
            'create_at' => $this->integer()->notNull(),
            'update_at' => $this->integer(),
            'time_spend' => $this->integer()->notNull(),
            'time_plan' => $this->integer()->notNull(),
            'percent' => $this->integer()->notNull(),
            'id_sprint' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-sprint_order-id_sprint',
            'sprint_order',
            'id_sprint'
        );
        $this->addForeignKey(
            'fk-sprint_order-id_sprint',
            'sprint_order',
            'id_sprint',
            'sprint',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-sprint_order-id_user',
            'sprint_order',
            'id_user'
        );
        $this->addForeignKey(
            'fk-sprint_order-id_user',
            'sprint_order',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180827_120225_create_tables_stage_stage_goal_stage_goal_go_sprint_sprint_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180827_120225_create_tables_stage_stage_goal_stage_goal_go_sprint_sprint_order cannot be reverted.\n";

        return false;
    }
    */
}
