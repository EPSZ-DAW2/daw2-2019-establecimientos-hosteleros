<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Etiquetas;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosEtiquetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mis etiquetas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-etiquetas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Seguir una etiqueta'), ['seguiretiqueta'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
          //  'usuario_id',
            //'etiqueta_id',
            [
                'attribute' => 'Etiqueta',
                'value' => function ($model) {
                                return Etiquetas::find()->where(['id'=>$model->etiqueta_id])->one()->nombre;
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
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete?'),
                            'data-method' => 'post', 'data-pjax' => '0',
                    ]);
                }

            ]

            ],
        ],
    ]); ?>
 <p>
        <?= Html::a(Yii::t('app', 'Volver al perfil'), ['perfil/index'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
