<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosLocalesSeguimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios Locales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-locales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuarios Locales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            'local_id',
            'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
