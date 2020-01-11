<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Cambio de contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-changepassword">
    <h1><?= Html::encode($this->title) ?></h1>
   
    <p>Rellena los siguientes campos para cambiar tu contraseña :</p>
   
    <?php $form = ActiveForm::begin([
        'id'=>'changepassword-form',
        'options'=>['class'=>'form-horizontal'],
        'fieldConfig'=>[
            'template'=>"{label}\n<div class=\"col-lg-3\">
                        {input}</div>\n<div class=\"col-lg-5\">
                        {error}</div>",
            'labelOptions'=>['class'=>'col-lg-2 control-label'],
        ],
    ]); ?>
        <?= $form->field($model,'oldpass',['inputOptions'=>[
            'placeholder'=>'Vieja contraseña'
        ]])->passwordInput() ?>
       
        <?= $form->field($model,'newpass',['inputOptions'=>[
            'placeholder'=>'Nueva contraseña'
        ]])->passwordInput() ?>
       
        <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
            'placeholder'=>'Repite contraseña'
        ]])->passwordInput() ?>
       
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Finalizar cambio',[
                    'class'=>'btn btn-primary'
                ]) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>