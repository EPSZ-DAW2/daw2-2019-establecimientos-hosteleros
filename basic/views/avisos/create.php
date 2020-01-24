<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */

$this->title = 'Nuevo aviso';
$this->params['breadcrumbs'][] = ['label' => 'Avisos de usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-avisos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCrear', [
        'model' => $model,
    ]) ?>

</div>
