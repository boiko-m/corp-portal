<?php

use yii\db\Migration;

/**
 * Class m180710_100021_create_tables_want_to_project_and_project_and_stage_stage_goal_and_project_user_and_project_user_group
 */
class m180710_100021_create_tables_want_to_project_and_project_and_stage_stage_goal_and_project_user_and_project_user_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projects', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'description' => $this->text(),
            'goal' => $this->text(),
            'create_at' => $this->integer()->notNull(),
            'close_at' => $this->integer()->notNull(),
            'archive' => $this->boolean()->defaultValue(true),
            'create_user' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-projects-create_user',
            'projects',
            'create_user'
        );
        $this->addForeignKey(
            'fk-projects-create_user',
            'projects',
            'create_user',
            'user',
            'id',
            'CASCADE'
        );



        $this->createTable('want_to_project', [
            'id' => $this->primaryKey(),
            'complete' => $this->boolean()->defaultValue(false),
            'decision' => $this->boolean()->defaultValue(false),
            'id_user' => $this->integer()->notNull(),
            'id_project' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-want_to_project-id_user',
            'want_to_project',
            'id_user'
        );
        $this->addForeignKey(
            'fk-want_to_project-id_user',
            'want_to_project',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-want_to_project-id_project',
            'want_to_project',
            'id_project'
        );
        $this->addForeignKey(
            'fk-want_to_project-id_project',
            'want_to_project',
            'id_project',
            'projects',
            'id',
            'CASCADE'
        );



        $this->createTable('project_user_group', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'description' => $this->text(),
            'create_at' => $this->integer()->notNull(),
            'create_user' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-project_user_group-create_user',
            'project_user_group',
            'create_user'
        );
        $this->addForeignKey(
            'fk-project_user_group-create_user',
            'project_user_group',
            'create_user',
            'user',
            'id',
            'CASCADE'
        );



        $this->createTable('project_user', [
            'id' => $this->primaryKey(),
            'id_project' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'id_project_user_group' => $this->integer()->notNull(),
            'create_at' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-project_user-id_project',
            'project_user',
            'id_project'
        );
        $this->addForeignKey(
            'fk-project_user-id_project',
            'project_user',
            'id_project',
            'projects',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-project_user-id_user',
            'project_user',
            'id_user'
        );
        $this->addForeignKey(
            'fk-project_user-id_user',
            'project_user',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-project_user-id_project_user_group',
            'project_user',
            'id_project_user_group'
        );
        $this->addForeignKey(
            'fk-project_user-id_project_user_group',
            'project_user',
            'id_project_user_group',
            'project_user_group',
            'id',
            'CASCADE'
        );



        $this->createTable('project_news', [
            'id' => $this->primaryKey(),
            'avatar' => $this->string(100)->defaultValue('news.png'),
            'title' => $this->string(150)->notNull(),
            'content' => $this->text()->notNull(),
            'create_at' => $this->integer()->notNull(),
            'create_user' => $this->integer()->notNull(),
            'id_project' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-project_news-id_project',
            'project_news',
            'id_project'
        );
        $this->addForeignKey(
            'fk-project_news-id_project',
            'project_news',
            'id_project',
            'projects',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-project_news-create_user',
            'project_news',
            'create_user'
        );
        $this->addForeignKey(
            'fk-project_news-create_user',
            'project_news',
            'create_user',
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
        echo "m180710_100021_create_tables_want_to_project_and_project_and_stage_stage_goal_and_project_user_and_project_user_group cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180710_100021_create_tables_want_to_project_and_project_and_stage_stage_goal_and_project_user_and_project_user_group cannot be reverted.\n";

        return false;
    }
    */
}
