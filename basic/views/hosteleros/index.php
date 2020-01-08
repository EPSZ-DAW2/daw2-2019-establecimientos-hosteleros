<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HostelerosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hosteleros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hosteleros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Hostelero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            'nif_cif',
            'razon_social',
            'telefono_comercio',
            //'telefono_contacto',
            //'url:ntext',
            //'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
