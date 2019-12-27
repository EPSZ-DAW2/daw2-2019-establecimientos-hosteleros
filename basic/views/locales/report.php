<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Report Locales: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<div class="locales-update">

    <h1>HAS REPORTADO EL LOCAL "<?= $model->titulo ?>" </h1>

    <?php
    	//Aumenta en 1 el número de denuncias si se ha pulsado en el boton de report de la vista de la página
    	$model->num_denuncias = $model->num_denuncias + 1;
    	$model->update();
    ?>

    <p><strong>Nº denuncias:</strong> <span class="text-danger"><?= $model->num_denuncias ?></span></p>

</div>
