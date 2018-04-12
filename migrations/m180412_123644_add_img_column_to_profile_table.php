<?php

use yii\db\Migration;

/**
 * Handles adding img to table `profile`.
 */
class m180412_123644_add_img_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('[corplbr].[profile]', 'img', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('[corplbr].[profile]', 'img');
    }
}
