<?php

use app\models\Zonas;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAreaModeracion */
/* @var $form yii\widgets\ActiveForm */
//$usuarios      = Usuarios::find()->orderBy('nombre')->asArray()->all();
//$listaUsuarios = ArrayHelper::map($usuarios, 'id', 'name');
$zonas      = Zonas::find()->orderBy('nombre')->asArray()->all();
$listaZonas = ArrayHelper::map($zonas, 'id', 'nombre');
?>

<div class="usuarios-area-moderacion-form">

    <?php $form = ActiveForm::begin();?>
    <?=//$form->field($model, 'usuario_id')->dropDownList($listaUsuarios);
$form->field($model, 'usuario_id')->textInput()
?>

    <?=
$form->field($model, 'zona_id')->dropDownList($listaZonas);
//$form->field($model, 'zona_id')->textInput()?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
