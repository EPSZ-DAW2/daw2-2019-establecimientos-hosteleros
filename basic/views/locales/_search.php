<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'lugar') ?>

    <?= $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'zona_id') ?>

    <?php // echo $form->field($model, 'categoria_id') ?>

    <?php // echo $form->field($model, 'imagen_id') ?>

    <?php // echo $form->field($model, 'sumaValores') ?>

    <?php // echo $form->field($model, 'totalVotos') ?>

    <?php // echo $form->field($model, 'hostelero_id') ?>

    <?php // echo $form->field($model, 'prioridad') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'terminado') ?>

    <?php // echo $form->field($model, 'fecha_terminacion') ?>

    <?php // echo $form->field($model, 'num_denuncias') ?>

    <?php // echo $form->field($model, 'fecha_denuncia1') ?>

    <?php // echo $form->field($model, 'bloqueado') ?>

    <?php // echo $form->field($model, 'fecha_bloqueo') ?>

    <?php // echo $form->field($model, 'notas_bloqueo') ?>

    <?php // echo $form->field($model, 'cerrado_comentar') ?>

    <?php // echo $form->field($model, 'cerrado_quedar') ?>

    <?php // echo $form->field($model, 'crea_usuario_id') ?>

    <?php // echo $form->field($model, 'crea_fecha') ?>

    <?php // echo $form->field($model, 'modi_usuario_id') ?>

    <?php // echo $form->field($model, 'modi_fecha') ?>

    <?php // echo $form->field($model, 'notas_admin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
