<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosAreaModeracionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Areas de Moderación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-area-moderacion-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Crear Areas de Moderación', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel'  => $searchModel,
    'columns'      => [
        //['class' => 'yii\grid\SerialColumn'],

        'id',
        'usuario_id',
        'zona_id',

        ['class' => 'yii\grid\ActionColumn'],

    ],
]);?>


</div>
