<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadImagenes */
/* @var $form yii\widgets\ActiveForm */
//formulario para la carga de imagenes y vincularla a una actividad
?>

<div class="locales-imagenes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'local_id')->textInput(['value'=>$local_id]) ?>

    <?= $form->field($model, 'imagen_id')->textInput(['maxlength' => true])->label('Escriba el nombre de la imagen. Esta debe situarse en la carpeta basic/web/images') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>