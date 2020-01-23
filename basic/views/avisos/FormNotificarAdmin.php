<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $this->context->layout = 'FondosPerfil'; ?>
<div class="usuarios-avisos-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'fecha_aviso')->textInput() ?>-->

    <!--<?= $form->field($model, 'clase_aviso_id')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <!--<?= $form->field($model, 'destino_usuario_id')->textInput() ?>-->

    <!--<?= $form->field($model, 'origen_usuario_id')->textInput() ?>-->

    <!--<?= $form->field($model, 'local_id')->textInput() ?>-->

    <!--<?= $form->field($model, 'comentario_id')->textInput() ?>-->

    <!--<?= $form->field($model, 'fecha_lectura')->textInput() ?>-->

    <!--<?= $form->field($model, 'fecha_aceptado')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
