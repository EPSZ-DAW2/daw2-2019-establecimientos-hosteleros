<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UsuariosAvisos;
use app\widgets\ListarAviso;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */

$this->title = "Aviso #".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avisos de usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<h1 class="text-center"><?= Html::encode($this->title) ?></h1>

<table class="table table-striped table-bordered">	
	<?= ListarAviso::widget(['model'=>$model]); ?>   
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
