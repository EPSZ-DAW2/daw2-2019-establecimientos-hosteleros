<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="local-search">

    <?php $form = ActiveForm::begin([
        'action' => ['busquedasimple'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= Html::input('text', 'texto','') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reiniciar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
