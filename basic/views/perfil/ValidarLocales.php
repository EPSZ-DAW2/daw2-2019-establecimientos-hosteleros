<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales';

?>
<?php $this->context->layout = 'FondosPerfil'; ?>
<div class="locales-index">
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
    <h3>Estos locales estan pendientes de ser aceptados o suspendidos.</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'titulo:ntext',
            'descripcion:ntext',
            'lugar:ntext',
            //'url:ntext',
            //'zona_id',
            //'categoria_id',
            //'imagen_id',
            //'sumaValores',
            //'totalVotos',
            //'hostelero_id',
            //'prioridad',
            //'visible',
            //'terminado',
            //'fecha_terminacion',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'cerrado_comentar',
            //'cerrado_quedar',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {myButton} {myButton2} {myButton3}',  // the default buttons + your custom button
            'buttons' => [
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>',"../locales/view?id=".$model->id, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Aceptar', ['actualizarlocal','id'=>$model->id,'estado'=>1,'model'=>$model],[
                                'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Esta accion pondra como ACEPTADO al local: '.$model->titulo.'¿Estas seguro?',
                              ],
                               'class' => 'btn btn-info']);
                },
                'myButton2' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Suspender', ['actualizarlocal','id'=>$model->id,'estado'=>2,'model'=>$model],
                                [
                                'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Esta accion pondra como SUSPENDIDO al local: '.$model->titulo.'¿Estas seguro?',
                              ],
                               'class' => 'btn btn-warning']);
                },
                'myButton3' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Cancelar', ['actualizarlocal','id'=>$model->id,'estado'=>3,'model'=>$model], 
                                [
                                'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Esta accion pondra como CANCELADO al local: '.$model->titulo.'¿Estas seguro?',
                              ],
                               'class' => 'btn btn-danger']);
                }
                ]
            ]
        ],
    ]); ?> 




        
</div>
