<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosLocales */

$this->title = 'Update Usuarios Locales: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-locales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
