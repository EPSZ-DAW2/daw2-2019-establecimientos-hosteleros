<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HostelerosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hosteleros';
?>
<?php $this->context->layout = 'FondosPerfil'; ?>
<div class="hosteleros-index">
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
    <h3>Aqui encontrarás los hostales que has dado de alta:</h3>
    <br><br><br>
    <h4><b>Locales no aprobados y que por lo tanto puedes modificar:</b></h4>
    
    <?= GridView::widget([
        'dataProvider' => $dataProviderNoTerminado,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',

            'titulo',
            'descripcion',
            'lugar',
            'crea_fecha',
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

          'template' => '{view} {delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'ver','class'=>'btn btn-success']);
            },

            'delete' => function ($url, $model) {
                return Html::a('Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => '¿Estas seguro de eliminar este local? Se borraran todos los comentarios/valoraciones,convocatorias etc..',
                              ],
                            'title' => 'borrar','class' => 'btn btn-danger',
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

            //'id',

            'titulo',
            'descripcion',
            'lugar',
            'crea_fecha',        

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

            //'id',

            'titulo',
            'descripcion',
            'lugar',
            'crea_fecha',

        

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<br><br>
    <h4><b>Locales  Bloqueados:</b></h4>

       <?= GridView::widget([
        'dataProvider' => $dataProviderBloqueados,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',

            'titulo',
            'descripcion',
            'lugar',
            'crea_fecha',
            'fecha_bloqueo',
            'notas_bloqueo',
            //['class' => 'yii\grid\ActionColumn'],
             ['class' => 'yii\grid\ActionColumn',

          'template' => '{myButton}',
          'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Subsanar problema', ['peticiondesbloqueo','id'=>$model->id],
                               ['class' => 'btn btn-success']);
                },

                ],
            ],
        ],

    ]); ?>

</div>
