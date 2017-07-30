<?php

?>
<div class="well rss-item" id="<?= md5($model['guid']) ?>">

    <div class="title">
        <h3><a href="<?= $model['link'] ?>">
                <?= $model['title'] ?>
            </a></h3>
    </div>

    <div class="row">
        <?php
        if (isset($model['enclosure']['@attributes']['url'])) {
            ?>
            <div class="image col-md-3 col-sm-4">

                <a href="<?= $model['link'] ?>">
                    <img class="img-responsive thumbnail" src="<?= $model['enclosure']['@attributes']['url'] ?>"
                         alt="<?= $model['title'] ?>"/>
                </a>
            </div>
            <?php
        }
        ?>
        <div class="description <?php if (isset($model['enclosure']['@attributes']['url'])) { ?>col-md-9 col-sm-8<?php } else { ?> com-sm-12 <?php } ?>">
            <p><?= $model['description'] ?></p>
        </div>
    </div>
    <div class="item-bottom">
        <div class="pull-left">
            <a href="#" class="commentslink btn btn-sm btn-primary" data-id="<?= md5($model['guid']) ?>"
               data-link="<?= $model['guid'] ?>">
                <span>[+]</span> <?= Yii::t('app', 'Comments') ?>
            </a>
        </div>
        <div class="pubDate pull-right">
            <b><?= $model['category'] ?></b>, <?= date('d-m-Y, H:i', strtotime($model['pubDate'])) ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="comments-wrp">
        <div class="comments-form">

        </div>
        <div class="comments">

        </div>
    </div>

</div>

<div class="spacer"></div>

