<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'bloquear Usuarios: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'bloquear';
?>
<div class="usuarios-bloquear">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formBloqueo', [
        'model' => $model,
    ]) ?>

</div>
