<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesConvocatoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales Convocatorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locales-convocatorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Locales Convocatorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'local_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
