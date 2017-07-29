<?php

namespace app\controllers;

use HttpException;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\httpclient\Response;
use yii\httpclient\XmlParser;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {

        $cachekey = 'rss_' . env('RSS_CHANNEL') . '_items';


        /** @var array|bool $items */
        $items = \Yii::$app->cache->get($cachekey);

        if ($items === false) {
            $items = array();

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
            if (!isset($data['channel'])) {
                throw new HttpException(400, 'Bad channel');
            }

            foreach ($data['channel'] as $key => $value) {
                if ($key == 'item') {
                    $items = $value;
                }
            }


            \Yii::$app->cache->set($cachekey, $items, env('RSS_INTERVAL', 3600));
        }


        ArrayHelper::multisort($items, function ($item) {
            return $item->pubDate;
        }, SORT_DESC);

        $dataprovider = new ArrayDataProvider([
            'allModels' => $items,
            'pagination' => [
                'pageSize' => env('PAGE_SIZE'),
            ],
        ]);


        return $this->render('index', [
            'dataprovider' => $dataprovider,
        ]);
    }


}
