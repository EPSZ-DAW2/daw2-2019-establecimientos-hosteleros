<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesImagenes */
//actualiar llama a la vista de formulario

$this->title = 'Modificar  Imagen: ';
$this->params['breadcrumbs'][] = ['label' => 'Locales Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="locales-imagenes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'locales' => $locales,
    ]) ?>

</div>