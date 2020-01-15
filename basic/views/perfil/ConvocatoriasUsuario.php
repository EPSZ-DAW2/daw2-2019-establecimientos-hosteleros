<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesConvocatoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales Convocatorias';

?>
<div class="Convocatorias-index">
    <div>
      <?= $this->render('PerfilCabecera', [
                //'searchModel' => $searchModel,
                'dataProviderPerfil' => $dataProviderPerfil,
                'hostelero' => $hostelero,
                'avisos'=>$avisos,
            ]); ?>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>


    <h3>Aqui están todas las convocatorias a las que te has apuntado.</h3>
    <?php  

   /* use yii\data\ArrayDataProvider;

    $data = array_merge($dataProviderAll->getModels(), $dataProvider2->getModels());

    $dataProvider = new ArrayDataProvider([
      'allModels' => $data
    ]);*/
     // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'local_id',
            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
            ],

           /* [
                    'attribute'=>'id',
                    'value' =>'LocalesConvocatoriasAsistentes.id',
            ],*/
            'texto:ntext',
            'fecha_desde',
            'fecha_hasta',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueada',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url,$model, $key) {     // render your custom button
                    return Html::a('Quitar convocatoria', ['quitarconvocatoria','id'=>$key/*,'local_id'=>$model->local_id*/], ['class' => 'btn btn-success']);
                }
            ]
            ]
        ],
    ]); 

    ?>


</div>
