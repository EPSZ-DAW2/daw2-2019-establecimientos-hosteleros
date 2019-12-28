<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Zonas';
$this->params['breadcrumbs'][] = $this->title;
print_r($dataProvider->getKeys());
?>
<div class="zonas-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Create Zonas', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        //'clase_zona_id',
        [
            'attribute' => 'clase_zona_id',
            //Funcion que cambia el numero de clase id por su nombre de clase
            'value'     => function ($model) {
                return $model->getNombreZona($model->clase_zona_id);
            },

        ],
        'nombre',
        'zona_id',
        'zonaPadre',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);

?>


</div>
