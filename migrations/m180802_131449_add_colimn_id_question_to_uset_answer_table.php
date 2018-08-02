<?php

use yii\db\Migration;

/**
 * Class m180802_131449_add_colimn_id_question_to_uset_answer_table
 */
class m180802_131449_add_colimn_id_question_to_uset_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('answers_user', 'id_question', $this->integer());
        $this->addForeignKey(
            'fk-answers_user-id_question',
            'answers_user',
            'id_question',
            'questionnaire',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180802_131449_add_colimn_id_question_to_uset_answer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180802_131449_add_colimn_id_question_to_uset_answer_table cannot be reverted.\n";

        return false;
    }
    */
}
