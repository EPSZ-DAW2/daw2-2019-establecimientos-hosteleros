<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */

$this->title = 'Aquí podras mandar un mensaje a un admin.';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios Avisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-avisos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('FormNotificarAdmin', [
        'model' => $model,
    ]) ?>

</div>
