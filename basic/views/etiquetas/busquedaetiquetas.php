<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Etiqueta;

?>

<div class="local-search">

    <?php $form = ActiveForm::begin([
        'action' => ['busquedaetiquetas'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php

        //generar un array con todas las etiquetas indexadas.

            $etiqueta = Etiqueta::find()->orderBy(['nombre' => SORT_ASC])->all();
            $etiquetalista=ArrayHelper::map($etiqueta,'id','nombre');

            $currentUserId="Etiquetas";

        //generar input de tipo dropdown

            echo Html::dropDownList('id', 'id', $etiquetalista,array('prompt'=>'Selecciona una etiqueta...'));

        ?>


        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
       



    <?php ActiveForm::end(); ?>

</div>



