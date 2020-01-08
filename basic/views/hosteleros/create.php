<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hosteleros */

$this->title = 'Create Hosteleros';
$this->params['breadcrumbs'][] = ['label' => 'Hosteleros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hosteleros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
