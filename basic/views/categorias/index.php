<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Categorias;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($nivel) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear nueva categoria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            [
                'attribute' => 'Descripcion',
                'value' => 'descripcion',
            ],
            
            [
                'attribute' => 'Icono',
                'value' => 'icono',
            ],
            [
                'attribute' => 'Categoria Padre',
                'value' => function ($model) {
                                return $model->categoria_id==0 ? 'Ninguna' : Categorias::find()->where(['id'=>$model->categoria_id])->one()->nombre;
                            }
            ],

            ['class' => 'yii\grid\ActionColumn'],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{index}',
            'buttons'=>[
                'index'=>function($url){
                    return Html::a('Ver subcategorias', $url,);
                }

            ]

            ],
        ],
    ]); ?>
 <p>
        <?= Html::a(Yii::t('app', 'Volver'), ['index'.($padre==0 ? '' : '?id='.$padre)], ['class' => 'btn btn-success']) ?>
    </p>

</div>
