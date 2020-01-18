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


	<?= //La valoracion entra entre 1 y 10
        $form->field($model, 'valoracion')->textInput([
            'type'=>'number',
            'min'=>0,
            'max'=>5]) ?>
	<?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>
    <?php
        $fecha_hora = date('Y-m-d h:i:s');
    ?>
    
    <?= $form->field($model, 'crea_fecha')->hiddenInput(['value'=>$fecha_hora])->label(false) ?>

    <?php

            $fecha_modificacion = date('Y-m-d h:i:s');
        
    ?>

    <?= $form->field($model, 'modi_fecha')->hiddenInput(['value'=>$fecha_modificacion])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
