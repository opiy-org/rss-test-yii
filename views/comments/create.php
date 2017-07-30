<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Comment */
/* @var $form ActiveForm */
?>
<div class="comments-create">

    <?php $form = ActiveForm::begin([
        'id' => 'cf' . uniqid(),
        'method' => 'post',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute('comments/validate'),
    ]); ?>

    <?= $form->field($model, 'guid')->hiddenInput(['class' => 'guid'])->label(false) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'description')->textarea() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Comment'), ['class' => 'btn btn-success btn-sm']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- comments-create -->
