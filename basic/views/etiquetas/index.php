<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EtiquetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Etiquetas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etiquetas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Etiquetas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?php
        if (Yii::$app->user->identity->admin){?>
            <?= Html::a(Yii::t('app', 'Unificar Etiquetas'), ['unificacion'], ['class' => 'btn btn-success']) ?>
        <?php
        }?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            [
                'attribute' => 'Descripcion',
                'value' => 'descripcion',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Volver atrás'), ['mantenimiento/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
