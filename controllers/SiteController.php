<?php

namespace app\controllers;

use app\models\RssChannel;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {
        /** @var array $items RSS channel items */
        $items = (new RssChannel())->getItems();

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
