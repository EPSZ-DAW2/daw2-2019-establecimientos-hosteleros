<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatoriasAsistentes */

$this->title = 'Update Locales Convocatorias Asistentes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locales Convocatorias Asistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locales-convocatorias-asistentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
