<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div>
	<div class="card col-md-4">

		<h5><strong>Nombre establecimiento: </strong><?php echo $model->titulo; ?></h5> <br>
		<h5><strong>Descripción: </strong><?php echo $model->descripcion; ?></h5> <br>
		<h5><strong>Lugar: </strong><?php echo $model->lugar; ?></h5> <br>
		<h5><strong>Url: </strong><?php echo $model->url; ?></h5> <br>
		<h5><strong>Número total de valoraciones: </strong><?php echo $model->sumaValores; ?></h5> <br>
		<h5><strong>Total votos: </strong><?php echo $model->totalVotos; ?></h5> <br>
		<h5><strong>Prioridad del establecimiento: </strong><?php echo $model->prioridad; ?></h5> <br>
		<h5><strong>Estado actual del establecimiento: </strong><?php echo $model->terminado; ?></h5> 
	</div>
</div>