<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UsuariosAvisos;
use app\models\Locales;
use app\models\LocalesConvovatoriasAsistentes;
use app\models\LocalesConvovatorias;
use app\models\Usuarios;


/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatoriasAsistentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locales-convocatorias-asistentes-form">

    <?php $form = ActiveForm::begin(); 

    $locales_raw = Locales::find()->all();
	$locales_map = ArrayHelper::map($locales_raw,'id','titulo');

	$destino_raw = Usuarios::find()->all();
	$destino_map = ArrayHelper::map($destino_raw,'id','nombre');

    ?>

    <?php if ($model->local_id != 0){ ?>
		<?= $form->field($model, 'local_id')->dropDownList($locales_map) ?>
	<?php } ?>

    <?= $form->field($model, 'convocatoria_id')->textInput() ?>

    <?php if ($model->usuario_id != 0){ ?>
		<?= $form->field($model, 'usuario_id')->dropDownList($destino_map) ?>
	<?php } ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
