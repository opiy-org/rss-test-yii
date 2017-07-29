<?php

use yii\db\Migration;
use yii\db\Schema;

class m170729_072518_rss_item extends Migration
{

    public function up()
    {

        $this->createTable('rss_item', [
            'id' => $this->primaryKey(),
            'guid' => $this->string()->notNull(),
            'title' => $this->string(),
            'link' => $this->string(),
            'category' => $this->string(),
            'author' => $this->string(),
            'description' => $this->text(),
            'pubdate' => $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-ri-guid',
            'rss_item',
            'guid'
        );

        $this->createIndex(
            'idx-ri-category',
            'rss_item',
            'category'
        );

    }

    public function down()
    {

        $this->dropIndex(
            'idx-ri-guid',
            'rss_item'
        );

        $this->dropIndex(
            'idx-ri-category',
            'rss_item'
        );

        $this->dropTable('rss_item');


    }

}
