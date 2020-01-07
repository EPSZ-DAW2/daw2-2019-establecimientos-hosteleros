<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAreaModeracion */

$this->title = 'Create Usuarios Area Moderacion';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Area Moderacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-area-moderacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
