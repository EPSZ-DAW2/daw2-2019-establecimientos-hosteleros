<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */
/* @var $form yii\widgets\ActiveForm */
//print_r($local_id);
$fecha_modificacion = null;
?>

<div class="locales-form">



    <?php
		$form = ActiveForm::begin();
	?>

    <?= $form->field($model, 'local_id')->hiddenInput(['value'=>$local_id])->label(false) ?>

    <?= $form->field($model, 'comentario_id')->hiddenInput(['value'=>$comentario_id])->label(false)?>
	
	<?= //La valoracion entra entre 1 y 10
        $form->field($model, 'valoracion')->textInput([
            'type'=>'number',
            'min'=>0,
            'max'=>10]) ?>
	
	<?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>
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

    <?php //$form->field($model, 'cerrado')->textInput() 

     //$form->field($model, 'num_denuncias')->textInput() 

     //$form->field($model, 'fecha_denuncia1')->textInput() 

     //$form->field($model, 'bloqueado')->textInput() 

     //$form->field($model, 'fecha_bloqueo')->textInput() 

     //$form->field($model, 'notas_bloqueo')->textarea(['rows' => 6]) 

     //$form->field($model, 'crea_usuario_id')->textInput() 

     //

     //$form->field($model, 'modi_usuario_id')->textInput() 

     //$form->field($model, 'modi_fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
