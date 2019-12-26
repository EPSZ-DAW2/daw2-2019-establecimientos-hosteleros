<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\perfil */

$this->title = 'Hola '.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Aqui podras cambiar tus siguientes datos personales:</h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
