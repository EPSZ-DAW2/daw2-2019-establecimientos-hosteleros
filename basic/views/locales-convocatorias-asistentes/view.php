<?php

use yii\helpers\Html;
use app\widgets\ListarConvocatoriasAsistentes;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatoriasAsistentes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locales Convocatorias Asistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="locales-convocatorias-asistentes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
  <table class="table table-striped table-bordered">    
    <?= ListarConvocatoriasAsistentes::widget(['model'=>$model]); ?>   
</table>
 
    <div class="text-right">
    <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

