<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Report Locales: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locales-update">

    <h1>HAS REPORTADO EL LOCAL </h1>
    <p><strong>Nº denuncias:</strong> <span class="text-danger"><?= $model->num_denuncias ?></span></p>

</div>
