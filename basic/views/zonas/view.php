<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zonas */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="zonas-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data'  => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method'  => 'post',
    ],
])?>
    </p>

    <?=DetailView::widget([
    'model'      => $model,
    'attributes' => [
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
        //'zona_id',
        [
            'attribute' => 'zona_id',
            //Funcion que cambia el numero de clase id por su nombre de clase
            'value'     => function ($model) {
                //return $model->getZonaPadre($model->zona_id);
                return $model->getZonaPadre();
            },

        ],
    ],
])?>

</div>
