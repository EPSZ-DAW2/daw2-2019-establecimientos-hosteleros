<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesConvocatoriasAsistentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales Convocatorias Asistentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locales-convocatorias-asistentes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Locales Convocatorias Asistentes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'local_id',
            'convocatoria_id',
            'usuario_id',
            'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
