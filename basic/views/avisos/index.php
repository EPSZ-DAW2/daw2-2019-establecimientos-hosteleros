<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avisos de usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-avisos-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo aviso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_aviso',
            'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>