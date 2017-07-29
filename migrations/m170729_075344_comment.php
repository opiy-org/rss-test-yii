<?php

use yii\db\Migration;

class m170729_075344_comment extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'guid' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->dateTime(),
        ]);


        $this->createIndex(
            'idx-ri-guid',
            'comment',
            'guid'
        );

    }

    public function down()
    {
        $this->dropIndex(
            'idx-ri-guid',
            'comment'
        );

        $this->dropTable('comment');
    }

}
