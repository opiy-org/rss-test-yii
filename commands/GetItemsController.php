<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\RssItem;
use yii\console\Controller;


class GetItemsController extends Controller
{

    /**
     *  Get and cache channel items (ignore cache)
     */
    public function actionIndex()
    {
        $rssItem = new RssItem();
        $rssItem->cache = false;
        $items = $rssItem->getItems();
        echo count($items);
    }
}
