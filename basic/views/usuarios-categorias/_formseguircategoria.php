<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosCategorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'categoria_id')->dropDownList($lista,['style'=>'width:25%'])->label('Categoria a seguir') ?>

    <?= $form->field($model, 'fecha_seguimiento')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
