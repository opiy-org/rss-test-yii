<?php

namespace app\controllers;

use app\models\Comment;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;
use yii\web\Response;

class CommentsController extends Controller
{


    /**
     * validate new comment model
     * @return array
     */
    public function actionValidate()
    {
        /** @var Comment $model */
        $model = new Comment();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }


    /**
     * Store new comment in db
     * @param null|string $guid
     * @return string
     */
    public function actionCreate($guid = null)
    {
        /** @var Comment $model */
        $model = new Comment();

        //get guid from _GET or from _POST
        if ($guid != null) {
            $model->guid = trim($guid);
        }


        //if model saved successfully - create new
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $guid = $model->guid;

            $model = new Comment();
            $model->guid = $guid;
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Returns list of comments to rss-item by guid
     * @param $guid
     * @return string
     */
    public function actionIndex($guid)
    {
        /** @var Comment $comments */
        $comments = Comment::find()->where(['guid' => $guid])->orderBy(['id' => SORT_DESC])->all();

        return $this->renderAjax('indexAjax', [
            'comments' => $comments,
        ]);

    }


}
