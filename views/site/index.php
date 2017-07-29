<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = env('RSS_CHANNEL');
?>

<div class="site-index">
    <div class="body-content">
        <?php \yii\widgets\Pjax::begin() ?>
        <?php

        echo ListView::widget(['dataProvider' => $dataprovider, 'itemView' => 'item', 'layout' => "{items} \n {pager}"]);
        ?>
        <?php \yii\widgets\Pjax::end() ?>
    </div>
</div>

