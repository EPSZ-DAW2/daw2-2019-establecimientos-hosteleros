<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Zonas;
use app\models\ZonasSearch;
use app\models\ZonasQuery;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    
    <?php
    $zonas = Zonas::find()->all();
    $zonaslista=ArrayHelper::map($zonas,'id','nombre');
    ?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?> <!--que sea de tipo email ponerlo en rojo. No funciona-->


    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> <!--que tenga un numero minimo de caracteres-->

    <?= $form->field($model, 'nick')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?> 

    <?= $form->field($model, 'direccion')->textarea(['rows' => 6]) ?> <!--OK-->

    <?= $form->field($model, 'zona_id')->dropDownList($zonaslista) ?> <!--OK-->

    <!--NUEVO-->
    <?php
        /*$fecha_hora = date('Y-m-d h:i:s');
    ?>
    <?= $form->field($model, 'crea_fecha')->hiddenInput(['value'=>$fecha_hora])->label(false) ?>
    <?php
            $fecha_modificacion = date('Y-m-d h:i:s');
            ?>
            
            <?= $form->field($model, 'bloqueado')->dropDownList($model->getListaClasesBloqueo()) ?>
            <?= $form->field($model, 'terminado')->dropDownList($model->getListaClasesEstadosTerminacion()) ?>
            <?php
        
   */ ?>
    <!--No sé como obtener estos datos-->
    <?= $form->field($model, 'fecha_registro')->hiddenInput()->label(false) ?>  

    <?= $form->field($model, 'confirmado')->hiddenInput()->label(false) ?> 

    <?= $form->field($model, 'fecha_acceso')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'num_accesos')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'bloqueado')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'fecha_bloqueo')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'notas_bloqueo')->hiddenInput(['rows' => 6])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
