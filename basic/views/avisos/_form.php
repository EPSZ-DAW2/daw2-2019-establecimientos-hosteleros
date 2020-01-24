<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UsuariosAvisos;
use app\models\Locales;
use app\models\LocalesComentarios;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-avisos-form">

    <?php $form = ActiveForm::begin(); 
			$clases_raw = UsuariosAvisos::listaAvisos() ;
			$clases_map = ArrayHelper::map($clases_raw,'id','nombre');
			
			$locales_raw = Locales::find()->all();
			$locales_map = ArrayHelper::map($locales_raw,'id','titulo');
			
			$comentarios_raw = LocalesComentarios::find()->all();
			$comentarios_map = ArrayHelper::map($comentarios_raw,'id','texto');
			
			$destino_raw = Usuarios::find()->all();
			$destino_map = ArrayHelper::map($destino_raw,'id','nombre');
	?>

    <?= $form->field($model, 'fecha_aviso')->textInput() ?>

    <?= $form->field($model, 'clase_aviso_id')->dropDownList($clases_map); ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'destino_usuario_id')->dropDownList($destino_map) ?>
	
	<?php if ($model->origen_usuario_id != 0){ ?>
		 <?= $form->field($model, 'origen_usuario_id')->dropDownList($destino_map) ?>
	<?php } ?>
	<?php if ($model->local_id != 0){ ?>
		<?= $form->field($model, 'local_id')->dropDownList($locales_map) ?>
	<?php } ?>
	<?php if ($model->comentario_id != 0){ ?>  
		<?= $form->field($model, 'comentario_id')->dropDownList($comentarios_map) ?>
	<?php } ?>
    <?= $form->field($model, 'fecha_lectura')->textInput() ?>
    <?= $form->field($model, 'fecha_aceptado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>