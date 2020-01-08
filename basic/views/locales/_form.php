<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */
/* @var $form yii\widgets\ActiveForm */
print_r($actualizar);
$fecha_modificacion = null;
?>

<div class="locales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lugar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>
    
    <?php
        $fecha_hora = date('Y-m-d h:i:s');
    ?>
    
    <?= $form->field($model, 'crea_fecha')->hiddenInput(['value'=>$fecha_hora])->label(false) ?>

    <?php
        if($actualizar == 1)
        {
            $fecha_modificacion = date('Y-m-d h:i:s');
        }
    ?>

    <?= $form->field($model, 'modi_fecha')->hiddenInput(['value'=>$fecha_modificacion])->label(false) ?>

    <?php /*$form->field($model, 'zona_id')->textInput() ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <?= $form->field($model, 'imagen_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sumaValores')->textInput() ?>

    <?= $form->field($model, 'totalVotos')->textInput() ?>

    <?= $form->field($model, 'hostelero_id')->textInput() ?>

    <?= $form->field($model, 'prioridad')->textInput() ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <?= $form->field($model, 'terminado')->textInput() ?>

    <?= $form->field($model, 'fecha_terminacion')->textInput() ?>

    <?= $form->field($model, 'num_denuncias')->textInput() ?>

    <?= $form->field($model, 'fecha_denuncia1')->textInput() ?>

    <?= $form->field($model, 'bloqueado')->textInput() ?>

    <?= $form->field($model, 'fecha_bloqueo')->textInput() ?>

    <?= $form->field($model, 'notas_bloqueo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cerrado_comentar')->textInput() ?>

    <?= $form->field($model, 'cerrado_quedar')->textInput() ?>

    <?= $form->field($model, 'crea_usuario_id')->textInput() ?>

    <?= $form->field($model, 'modi_usuario_id')->textInput() ?>

    

    <?= $form->field($model, 'notas_admin')->textarea(['rows' => 6]) */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
