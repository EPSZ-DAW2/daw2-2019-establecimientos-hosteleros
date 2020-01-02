<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvisosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-avisos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_aviso') ?>

    <?= $form->field($model, 'clase_aviso_id') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'destino_usuario_id') ?>

    <?php // echo $form->field($model, 'origen_usuario_id') ?>

    <?php // echo $form->field($model, 'local_id') ?>

    <?php // echo $form->field($model, 'comentario_id') ?>

    <?php // echo $form->field($model, 'fecha_lectura') ?>

    <?php // echo $form->field($model, 'fecha_aceptado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
