<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesImagenes */

$this->title = 'Añadir Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Locales Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="locales-imagenes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'local_id' => $local_id,
    ]) ?>

</div>