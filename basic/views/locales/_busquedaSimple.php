<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categoria;
use app\models\CategoriaSearch;

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

  
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        
  

    <?php ActiveForm::end(); ?>

</div>
