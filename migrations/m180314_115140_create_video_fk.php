<?php

use yii\db\Migration;

/**
 * Class m180314_115140_create_video_fk
 */
class m180314_115140_create_video_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-corplbr_videos-id_user',
            'corplbr.videos',
            'id_user'
        );

        $this->addForeignKey(
            'fk-corplbr_videos-id_user',
            'corplbr.videos',
            'id_user',
            'corplbr.[user]',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-corplbr_videos-id_category',
            'corplbr.videos',
            'id_category'
        );

        $this->addForeignKey(
            'fk-corplbr_videos-id_category',
            'corplbr.videos',
            'id_category',
            'corplbr.videos_category',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-corplbr_videos-id_category',
            'corplbr.videos'
        );

        $this->dropIndex(
            'idx-corplbr_videos-id_category',
            'corplbr.videos'
        );

        $this->dropForeignKey(
            'fk-corplbr_videos-id_user',
            'corplbr.videos'
        );

        $this->dropIndex(
            'idx-corplbr_videos-id_user',
            'corplbr.videos'
        );
    }
}
