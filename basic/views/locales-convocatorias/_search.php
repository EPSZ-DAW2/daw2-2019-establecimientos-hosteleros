<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatoriasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locales-convocatorias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'local_id') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'fecha_desde') ?>

    <?= $form->field($model, 'fecha_hasta') ?>

    <?php // echo $form->field($model, 'num_denuncias') ?>

    <?php // echo $form->field($model, 'fecha_denuncia1') ?>

    <?php // echo $form->field($model, 'bloqueada') ?>

    <?php // echo $form->field($model, 'fecha_bloqueo') ?>

    <?php // echo $form->field($model, 'notas_bloqueo') ?>

    <?php // echo $form->field($model, 'crea_usuario_id') ?>

    <?php // echo $form->field($model, 'crea_fecha') ?>

    <?php // echo $form->field($model, 'modi_usuario_id') ?>

    <?php // echo $form->field($model, 'modi_fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
