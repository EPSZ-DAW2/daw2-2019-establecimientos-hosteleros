<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadImagenes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locales imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="locales-imagenes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'local_id',
            'imagen_id',
        ],
    ]) ?>
	<?=Html::img(Yii::$app->request->baseUrl."/images/".$model->imagen_id,['width'=>300])?>

</div>