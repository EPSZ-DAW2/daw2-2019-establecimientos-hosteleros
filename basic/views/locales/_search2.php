<?php

use app\models\LocalesSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['busquedaavanzada'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php // echo $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'lugar') ?>

    <?= $form->field($model, 'url') ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
