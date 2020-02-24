<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to eliminar this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php 
            if ($model->bloqueado==0) {?>
            
            <?= Html::a('Bloquear', ['bloquear', 'id' => $model->id], [
                'class' => 'btn btn-warning',
            ]) ?>
        <?php 
        }else
        { ?>
        <?= Html::a('Desbloquear', ['desbloquear', 'id' => $model->id], [
            'class' => 'btn btn-warning',
            'data' => [
                'confirm' => 'Are you sure you want to desbloquear this item?',
            ],
        ])?>
        <?php } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            'password',
            'nick',
            'nombre',
            'apellidos',
            'fecha_nacimiento',
            'direccion:ntext',
            'zona_id',
            'fecha_registro',
            'confirmado',
            'fecha_acceso',
            'num_accesos',
            'bloqueado',
            'fecha_bloqueo',
            'notas_bloqueo:ntext',
        ],
    ]) ?>

</div>
