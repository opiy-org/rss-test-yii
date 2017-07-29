<?php
foreach ($comments as $comment) {
     echo $this->renderAjax('item', [
        'comment' => $comment,
    ]);


}
