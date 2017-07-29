<hr>
<div class="comment">
    <span class="email">
        <a href="mailto: <?= $comment['email'] ?>"><?= $comment['email'] ?></a>
    </span>
    <span class="createdat">
        <small>(<?= date('d-m-Y H:i', strtotime($comment['created_at'])) ?>)</small>
    </span>
    <div class="clearfix"></div>
    <div class="cdescr">
        <?= $comment['description'] ?>
    </div>

</div>