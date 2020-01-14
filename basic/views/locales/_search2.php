<?php

use app\models\LocalesSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categoria;
use app\models\CategoriaSearch;

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
    <?= Html::input('text', 'titulo','') ?>
    <?= Html::input('text', 'descripcion','') ?>
    <?= Html::input('text', 'lugar','') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
