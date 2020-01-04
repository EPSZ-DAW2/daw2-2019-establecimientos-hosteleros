<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avisos y notificaciones';
$this->params['breadcrumbs'][] = $this->title;


?>



<style type="text/css">
    
    h3{
        margin-left: 5%;
        font-size:130%;
    }
    .rojo{
        color: red;
    }
    .verde{
        color:green;
    }

    hr{
        display: block;
        border-top: 3px solid black;
    }
</style>
<div class="usuarios-avisos-index">

    <h1><b><?= Html::encode($this->title) ?></b></h1>
    <h4>Aqui encontrarás todos tus avisos y notificaciones.</h4>
    <h2>Falta añadir quiza algun filtro en caso de no haber un tipo de notificaciones que no aparezca ni el titulo</h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br><br>
    <h2>Avisos generales</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderAvisos,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',

            
            
        ],

         

    ]); ?>


    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderAvisosNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],


            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>


    <br><hr><hr><br>
    <h2 >Notificaciones</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderNotificaciones,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],

            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([

        'dataProvider' => $dataProviderNotificacionesNoVisto,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],
           /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>


<br><hr><hr><br>
    <h2>Consultas</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConsulta,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],

            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConsultaNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>


    <br><hr><hr><br>
    <h2 id="notif">Denuncias</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderDenuncia,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],        /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderDenunciaNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>



    <br><hr><hr><br>
    <h2>Avisos de bloqueo:</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderBloqueo,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderBloqueoNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-success']);
                }
                ]
            ],

          /*  [
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>




</div>

