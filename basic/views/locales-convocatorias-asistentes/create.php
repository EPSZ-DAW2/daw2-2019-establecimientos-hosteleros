<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatoriasAsistentes */

$this->title = 'Create Locales Convocatorias Asistentes';
$this->params['breadcrumbs'][] = ['label' => 'Locales Convocatorias Asistentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locales-convocatorias-asistentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
