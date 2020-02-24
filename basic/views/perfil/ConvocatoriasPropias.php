<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesConvocatoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales Convocatorias';
?>
<?php $this->context->layout = 'FondosPerfil'; ?>
<div class="Convocatorias propias-index">

    <div>
      <?= $this->render('PerfilCabecera', [
                //'searchModel' => $searchModel,
                'dataProviderPerfil' => $dataProviderPerfil,
                'hostelero' => $hostelero,
                'avisos'=>$avisos,
                'localesSinValidar' => $localesSinValidar,
                'comentariosSinValidar' => $comentariosSinValidar, 
            ]); ?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Aqui encontraras las convocatorias que tu has convocado:</h3>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
            ],
            'texto:ntext',
            'fecha_desde',
            'fecha_hasta',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueada',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',

            [
          'class' => 'yii\grid\ActionColumn',

          'template' => '{view}{update}{delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a(
                    '<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),
                ]);
            },
            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'update'),
                ]);
            },

            'delete' => function ($url, $model) {
                return Html::a(
                           '<span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Are you sure?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='../locales-convocatorias/view?id='.$model->id;
                return $url;
            }

            if ($action === 'update') {
                $url ='../locales-convocatorias/update?id='.$model->id;
                return $url;
            }

            if ($action === 'delete') {
                $url ='../locales-convocatorias/deleteperfil?id='.$model->id.'&localid='.$model->local_id;
                return $url;
            }

          }
          ],
        ],
    ]); ?>


</div>