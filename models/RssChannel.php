<?php
/**
 * Created by PhpStorm.
 * User: opiy
 * Date: 30.07.2017
 * Time: 2:23
 */

namespace app\models;


use yii\httpclient\Client;
use yii\httpclient\Response;
use yii\httpclient\XmlParser;
use yii\web\HttpException;

class RssChannel
{

    public $cache = true;

    /**
     * @return array
     * @throws HttpException
     */
    public function getItems(): array
    {
        $cachekey = 'rss_' . env('RSS_CHANNEL') . '_items';


        /** @var array|bool $items */
        $items = \Yii::$app->cache->get($cachekey);

        if ($items === false or $this->cache === false) {
            $items = [];

            /** @var Response $response */
            $response = (new Client())->createRequest()
                ->setMethod('get')
                ->setUrl(env('RSS_CHANNEL'))
                ->send();
            if (!$response->isOk) {
                throw new HttpException(404, 'Channel not found');
            }

            /** @var array $data */
            $data = (new XmlParser())->parse($response);
            if (!isset($data['channel']['item'])) {
                throw new HttpException(400, 'Bad channel');
            }
            $items = $data['channel']['item'];


            \Yii::$app->cache->set($cachekey, $items, env('RSS_INTERVAL', 3600));
        }

        return $items;
    }


}