<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Categorias;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosCategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mis categorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Seguir una categoria'), ['seguircategoria'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
          //  'usuario_id',
            //'categoria_id',
            [
                'attribute' => 'Categoria',
                'value' => function ($model) {
                                return Categorias::find()->where(['id'=>$model->categoria_id])->one()->nombre;
                            }
            ],

            [
                'attribute' => 'Siguiendo desde',
                'value' => 'fecha_seguimiento',
            ],
           

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{quitar}',
            'buttons'=>[
                'quitar'=>function($url){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Estas seguro de querer eliminar la categoria?'),
                            'data-method' => 'post', 'data-pjax' => '0',
                    ]);
                }

            ]

            ],
        ],
    ]); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Volver atrás'), ['mantenimiento/index'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
