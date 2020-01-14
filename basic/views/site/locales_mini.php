<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div>
	<div class="card col-md-4">
		<h2><strong><?php if($model->titulo != null) echo $model->titulo; ?></strong></h2>
		<h3><?php if($model->descripcion != null) echo "<u>Descripción:</u> ".$model->descripcion; ?></h3>
		<h3><?php if($model->lugar != null) echo "<u>Ubicación:</u> ".$model->lugar; ?></h3>
		<h3><?php if($model->url != null) echo "<u>Página web:</u> ".$model->url; ?></h3>
	</div>
</div>