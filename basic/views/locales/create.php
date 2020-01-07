<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Create Locales';
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'actualizar' => $actualizar,
    ]) ?>

</div>
