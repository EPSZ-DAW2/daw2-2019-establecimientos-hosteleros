<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hosteleros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hosteleros-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nif_cif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_comercio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
