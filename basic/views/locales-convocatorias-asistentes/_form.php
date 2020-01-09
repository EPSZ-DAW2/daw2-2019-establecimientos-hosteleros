<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatoriasAsistentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locales-convocatorias-asistentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'local_id')->textInput() ?>

    <?= $form->field($model, 'convocatoria_id')->textInput() ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
