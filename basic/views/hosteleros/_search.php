<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HostelerosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hosteleros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'usuario_id') ?>

    <?= $form->field($model, 'nif_cif') ?>

    <?= $form->field($model, 'razon_social') ?>

    <?= $form->field($model, 'telefono_comercio') ?>

    <?php // echo $form->field($model, 'telefono_contacto') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'fecha_alta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
