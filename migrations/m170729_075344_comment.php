<?php

use yii\db\Migration;

class m170729_075344_comment extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'rss_item_id' => $this->integer()->notNull(),
            'email' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->dateTime(),
        ]);


        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-ri-comment-item_id',
            'comment',
            'rss_item_id',
            'rss_item',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-ri-comment-item_id',
            'comment'
        );

        $this->dropTable('comment');
    }

}
