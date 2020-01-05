<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LocalesConvocatorias */

$this->title = 'Update Locales Convocatorias: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locales Convocatorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locales-convocatorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
