<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HostelerosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hosteleros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hosteleros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Aqui encontrarás los hostales que has dado de alta:</h3>
    <br><br><br>
    <h4><b>Locales no aprobados y que por lo tanto puedes modificar:</b></h4>
    <h4>Despues de horas de pruebas no consigo entender por que sucede esto. La busqueda que hace a la base de datos es correcta, en la base de datos
    si se prueba esta busqueda da los datos correctos, aqui por alguna razon el primer dato que encuentra pisa al resto. Si hay 3 salen 3 iguales al primero que enc
uentra, si hay 4, habra 4 iguales etc.. y aun mas curioso es que el ID del local lo muestra de forma correcta sacandolo de la busqueda "correcta" pero el resto de datos de su fila los duplica del primero que encuentra.. de esta forma puedo editar ver y borrar el local al que corresponde verdaderamente cada fila.</h4>

    <?= GridView::widget([
        'dataProvider' => $dataProviderNoTerminado,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',

            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
                    /*'value' =>function($data) {
                       return $data->getlocales();}*/
                       /*'value' => function($model) {
                           // return implode(\yii\helpers\ArrayHelper::map($model->locales, 'id', 'titulo'));
                            return join(', ', yii\helpers\ArrayHelper::map($model->locales, 'id', 'titulo'));
                        },*/
            ],
            //'titulo',

            [
                    'attribute'=>'descripcion',
                    'value' =>'locales.descripcion',
            ],

            [
                    'attribute'=>'lugar',
                    'value' =>'locales.lugar',
            ],

            [
                    'attribute'=>'FechaCreacion',
                    'value' =>'locales.crea_fecha',
            ],

            //'usuario_id',
            //'nif_cif',
            //'razon_social',
            //'telefono_comercio',
            //'telefono_contacto',
            //'url:ntext',
            //'fecha_alta',
            /*
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url,$model, $key) {     // render your custom button
                    return Html::a('Quitar convocatoria', ['index','id'=>$key,'local_id'=>$model->local_id], ['class' => 'btn btn-success']);
                }
            ]]*/

             [
          'class' => 'yii\grid\ActionColumn',

          'template' => '{view}{delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),
                ]);
            },

            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
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
                $url ='../locales/view?id='.$model->id;
                return $url;
            }

            if ($action === 'delete') {
                $url ='../locales/delete?id='.$model->id;
                return $url;
            }

          }
          ],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<br><br>
    <h4><b>Locales  aprobados y que por lo tanto NO puedes modificar:</b></h4>

       <?= GridView::widget([
        'dataProvider' => $dataProviderTerminado,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',

            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
                    /*'value' =>function($data) {
                       return $data->getlocales();}*/
                       /*'value' => function($model) {
                           // return implode(\yii\helpers\ArrayHelper::map($model->locales, 'id', 'titulo'));
                            return join(', ', yii\helpers\ArrayHelper::map($model->locales, 'id', 'titulo'));
                        },*/
            ],
            //'titulo',

            [
                    'attribute'=>'descripcion',
                    'value' =>'locales.descripcion',
            ],

            [
                    'attribute'=>'lugar',
                    'value' =>'locales.lugar',
            ],

            [
                    'attribute'=>'FechaCreacion',
                    'value' =>'locales.crea_fecha',
            ],

        

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<br><br>
<h4><b>Locales  Suspendidos:</b></h4>

       <?= GridView::widget([
        'dataProvider' => $dataProviderSuspendido,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',

            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
                    /*'value' =>function($data) {
                       return $data->getlocales();}*/
                       /*'value' => function($model) {
                           // return implode(\yii\helpers\ArrayHelper::map($model->locales, 'id', 'titulo'));
                            return join(', ', yii\helpers\ArrayHelper::map($model->locales, 'id', 'titulo'));
                        },*/
            ],
            //'titulo',

            [
                    'attribute'=>'descripcion',
                    'value' =>'locales.descripcion',
            ],

            [
                    'attribute'=>'lugar',
                    'value' =>'locales.lugar',
            ],

            [
                    'attribute'=>'FechaBloqueo',
                    'value' =>'locales.fecha_bloqueo',
            ],

            [
                    'attribute'=>'Motivo',
                    'value' =>'locales.notas_bloqueo',
            ],


             [
          'class' => 'yii\grid\ActionColumn',

          'template' => '{myButton}',
          'buttons' => [
                'myButton' => function ($url, $model) {
                    return Html::a($url, [
                                'title' => Yii::t('app', 'view'),
                    ]);
                },

            ],
          ],
        

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
