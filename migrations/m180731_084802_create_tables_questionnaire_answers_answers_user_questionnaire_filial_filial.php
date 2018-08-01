<?php

use yii\db\Migration;

/**
 * Class m180731_084802_create_tables_questionnaire_answers_answers_user_questionnaire_filial_filial
 */
class m180731_084802_create_tables_questionnaire_answers_answers_user_questionnaire_filial_filial extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questionnaire', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'description' => $this->text(),
            'type' => $this->boolean()->defaultValue(false),
            'create_at' => $this->integer()->notNull(),
            'create_user' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-questionnaire-create_user',
            'questionnaire',
            'create_user'
        );
        $this->addForeignKey(
            'fk-questionnaire-create_user',
            'questionnaire',
            'create_user',
            'user',
            'id',
            'CASCADE'
        );


        $this->createTable('answers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'sort' => $this->integer(),
            'type' => $this->boolean()->defaultValue(false),
            'id_question' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-answers-id_question',
            'answers',
            'id_question'
        );
        $this->addForeignKey(
            'fk-answers-id_question',
            'answers',
            'id_question',
            'questionnaire',
            'id',
            'CASCADE'
        );


        $this->createTable('answers_user', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'id_answer' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-answers_user-id_answer',
            'answers_user',
            'id_answer'
        );
        $this->addForeignKey(
            'fk-answers_user-id_answer',
            'answers_user',
            'id_answer',
            'answers',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'ifk-answers_user-id_user',
            'answers_user',
            'id_user'
        );
        $this->addForeignKey(
            'fk-answers_user-id_user',
            'answers_user',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );


        $this->createTable('filials', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'id1C' => $this->string(5)->notNull(),
            'external' => $this->integer()->notNull(),
        ]);


        $this->createTable('question_filials', [
            'id' => $this->primaryKey(),
            'id_filials' => $this->integer()->notNull(),
            'id_question' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'ifk-question_filials-id_filials',
            'question_filials',
            'id_filials'
        );
        $this->addForeignKey(
            'fk-question_filials-id_filials',
            'question_filials',
            'id_filials',
            'filials',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180731_084802_create_tables_questionnaire_answers_answers_user_questionnaire_filial_filial cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_084802_create_tables_questionnaire_answers_answers_user_questionnaire_filial_filial cannot be reverted.\n";

        return false;
    }
    */
}
