<?php
namespace app\commands;

use app\models\RssChannel;
use yii\console\Controller;


class GetItemsController extends Controller
{

    /**
     *  Get and cache channel items (ignore cache)
     */
    public function actionIndex()
    {
        /** @var RssChannel $rss */
        $rss = new RssChannel();
        $rss->cache = false;

        /** @var array $items */
        $items = $rss->getItems();
        echo count($items);
    }
}
