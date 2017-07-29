<div class="well rss-item" id="<?= $model['guid'] ?>">

    <div class="title">
        <h3><a href="<?= $model['link'] ?>">
                <?= $model['title'] ?>
            </a></h3>
    </div>

    <div class="row">
        <div class="image col-md-3 col-sm-4">
            <?php
            if (isset($model['enclosure']['@attributes']['url'])) {
                ?>
                <a href="<?= $model['link'] ?>">
                    <img class="img-responsive" src="<?= $model['enclosure']['@attributes']['url'] ?>"
                         alt="<?= $model['title'] ?>"/>
                </a>

                <?php
            }
            ?>
        </div>
        <div class="description col-md-9 col-sm-8">
            <?= $model['description'] ?>
        </div>
    </div>
    <div class="pubDate pull-right">
        <b><?= $model['category'] ?></b>, <?= date('d-m-Y, H:i', strtotime($model['pubDate'])) ?>
    </div>
    <div class="clearfix"></div>
    <div class="comments" id="comments<?= $model['guid'] ?>">

    </div>

</div>

<div class="spacer"></div>

