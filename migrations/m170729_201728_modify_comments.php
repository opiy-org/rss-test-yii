<?php

use yii\db\Migration;

class m170729_201728_modify_comments extends Migration
{

    public function up()
    {
        $this->alterColumn('comment','created_at','DATETIME NULL DEFAULT CURRENT_TIMESTAMP ');
    }

    public function down()
    {
        $this->alterColumn('comment','created_at','DATETIME');
    }

}
