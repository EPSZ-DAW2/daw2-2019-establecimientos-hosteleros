<?php
use yii\widgets\ActiveForm;
use app\models\LocalesSearch;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Categoria;
use app\models\CategoriaSearch;


?>
<div class="locales-index">

     <?php $form = ActiveForm::begin([
        'action' => ['busquedaavanzada'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <h5> Nombre del local </h5>
    <?= Html::input('text', 'titulo','') ?> <br><br>
    <h5> Descripción del local </h5>
    <?= Html::input('text', 'descripcion','') ?> <br><br>
    <h5> Lugar de ubicación del local </h5>
    <?= Html::input('text', 'lugar','') ?> <br><br>
    <h5> Página web del local </h5>
    <?= Html::input('text', 'url','') ?> <br><br>
    <h5> Suma de las valoraciones para el establecimiento</h5>
    <?= Html::input('text', 'sumaValores','') ?> <br><br>

  
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        
  

    <?php ActiveForm::end(); ?>

   
    
</div>
