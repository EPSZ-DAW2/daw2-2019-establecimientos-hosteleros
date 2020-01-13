<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Etiquetas;
use app\models\LocalesEtiquetas;
use app\models\EtiquetasSearch;
use app\models\EtiquetasQuery;
use app\models\LocalesEtiquetasQuery;


?>

<div class="etiqueta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['busquedaetiqueta'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php
    $etiquetas = Etiquetas::find()->all();

    foreach ($etiquetas as $key => $value) {
        echo '<p>';
        
        //echo $value['id'];
        echo Html::a(Yii::t('app', $value['nombre']), ['site/busquedaetiqueta','etiqueta_id'=>$value['id']]);
         // echo Html::a(Yii::t('app', $value['nombre']), ['view?id='.$value['id']], ['class' => 'btn btn-success']);
        echo '</p>';
    }

        ?>

        <?php 

        ActiveForm::end(); ?>

</div>
