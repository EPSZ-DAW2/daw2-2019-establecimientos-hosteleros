<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosEtiquetas */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="usuarios-etiquetas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'etiqueta_id')->dropDownList($lista,['style'=>'width:25%'])->label('Etiqueta a seguir') ?>

    <?= $form->field($model, 'fecha_seguimiento')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
