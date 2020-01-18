<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAreaModeracion */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Area Moderacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-area-moderacion-view">

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
        //'usuario_id',
        //'zona_id',
        [
            'attribute' => 'usuario',
            'value'     => $model->usuario->nombre,
        ],
        //'zona_id',
        [
            'attribute' => 'zona',
            'value'     => $model->zona->nombre,
        ],
    ],
])?>

</div>
