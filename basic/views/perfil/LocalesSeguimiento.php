<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tus locales en seguimiento';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="usuarios-avisos-index">

    <h1><b><?= Html::encode($this->title) ?></b></h1>
    <h4>Aqui encontrarás todos los locales que tienes en seguimiento</h4>
    <h2></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'titulo',
            'url:ntext',
            'descripcion',
            'lugar',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Dejar de seguir', ['dejardeseguirlocal','id'=>$model->id], ['class' => 'btn btn-success']);
                }
            ]
        	]
        ],
    ]); ?>
</div>