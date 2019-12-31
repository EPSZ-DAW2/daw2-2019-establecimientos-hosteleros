<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avisos y notificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-avisos-index">

    <h1><b><?= Html::encode($this->title) ?></b></h1>
    <h4>Aqui encontrarás todos tus avisos y notificaciones.</h4>
    <h2>Falta añadir quiza algun filtro en caso de no haber un tipo de notificaciones que no aparezca ni el titulo ademas de añadir si se a leido un mensaje o no etc</h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br><br>
    <h2>Avisos generales</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderAvisos,
        'columns' => [
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


    <br><br>
    <h2>Notificaciones</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderNotificaciones,
        'columns' => [
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

    <br><br>
    <h2>Notificaciones</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConsulta,
        'columns' => [
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


<br><br>
    <h2>Consultas</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConsulta,
        'columns' => [
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


    <br><br>
    <h2>Denuncias</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderDenuncia,
        'columns' => [
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


    <br><br>
    <h2>Avisos de bloqueo:</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderBloqueo,
        'columns' => [
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
