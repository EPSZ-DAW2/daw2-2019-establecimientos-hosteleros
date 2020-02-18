<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locales-convocatorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'local_id')->textInput() ?-->

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    

    <?= $form->field($model, 'fecha_hasta')->textInput() ?>


    <!--?= $form->field($model, 'num_denuncias')->textInput() ?-->

    <!--?= $form->field($model, 'fecha_denuncia1')->textInput() ?-->

    <!--?= $form->field($model, 'bloqueada')->textInput() ?-->

    <!--?= $form->field($model, 'fecha_bloqueo')->textInput() ?-->

    <!--?= $form->field($model, 'notas_bloqueo')->textarea(['rows' => 6]) ?-->

    <!--?= $form->field($model, 'crea_usuario_id')->textInput() ?-->

    <!--?= $form->field($model, 'crea_fecha')->textInput() ?-->

    <!--?= $form->field($model, 'modi_usuario_id')->textInput() ?-->

    <!--?= $form->field($model, 'modi_fecha')->textInput() ?-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
