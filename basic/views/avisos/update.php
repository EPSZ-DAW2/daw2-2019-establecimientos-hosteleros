<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */

$this->title = 'Editar aviso #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avisos de usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Aviso #'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="usuarios-avisos-update">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
