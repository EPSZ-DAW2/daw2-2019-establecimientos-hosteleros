<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


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

    <h3>Estos comentarios tienen peticiones de actualizacion.</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'texto',
            'valoracion',



            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {myButton} {myButton2} {myButton3}',  // the default buttons + your custom button
            'buttons' => [
              'view' => function ($url, $model) {
                return Html::a(
                    '<span class="glyphicon glyphicon-eye-open"></span>',"../locales-comentarios/view?id=".$model->id, [
                            'title' => Yii::t('app', 'view'),
                    ]);
                },

              'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Aceptar', ['aceptarcomentario','id' =>$model->id],[
                                'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Esta accion permitira modificar el comentario al usuario ¿Estas seguro?',
                              ],
                               'class' => 'btn btn-success']);
                },

                'myButton2' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Rechazar', ['rechazarcomentario','id' =>$model->id],[
                                'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Esta accion no permitira modificar el comentario al usuario ¿Estas seguro?',
                              ],
                               'class' => 'btn btn-success']);
                },

                'myButton3' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Ver usuario', ["/usuarios/view?id=".$model->crea_usuario_id],[
                                'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                              ],
                               'class' => 'btn btn-success']);
                },

                
                ]
            ]
        ],
    ]); ?> 




        
</div>
