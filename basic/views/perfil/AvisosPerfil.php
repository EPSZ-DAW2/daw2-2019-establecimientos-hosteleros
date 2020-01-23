<?php
use yii\web\User;
use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avisos y notificaciones';

$dataProviderAvisos->pagination = ['pageSize' => 5];
$dataProviderAvisosNoVisto->pagination = ['pageSize' => 5];

$dataProviderNotificaciones->pagination = ['pageSize' => 5];
$dataProviderNotificacionesNoVisto->pagination = ['pageSize' => 5];

$dataProviderBloqueo->pagination = ['pageSize' => 5];
$dataProviderBloqueoNoVisto->pagination = ['pageSize' => 5];

$dataProviderConsulta->pagination = ['pageSize' => 5];
$dataProviderConsultaNoVisto->pagination = ['pageSize' => 5];


$dataProviderDenuncia->pagination = ['pageSize' => 5];
$dataProviderDenunciaNoVisto->pagination = ['pageSize' => 5];

$dataProviderMensaje->pagination = ['pageSize' => 5];
$dataProviderMensajeNoVisto->pagination = ['pageSize' => 5];


?>
<?php $this->context->layout = 'FondosPerfil'; ?>


<style type="text/css">
    
    h3{
        margin-left: 5%;
        font-size:130%;
    }
    .rojo{
        color: red;
    }
    .verde{
        color:green;
    }

    hr{
        display: block;
        border-top: 3px solid black;
    }
</style>
<div class="usuarios-avisos-index">
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


    <h1><b><?= Html::encode($this->title) ?></b></h1>
    <h4>Aqui encontrarás todos tus avisos y notificaciones.</h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br><br>
    <h2>Avisos generales</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderAvisos,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton} {view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='avisos/delete?id='.$model->id;
                        return $url;
                    }

                  }


            ],

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',

            
            
        ],



         

    ]); ?>


    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderAvisosNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],


            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>


    <br><hr><hr><br>
    <h2 >Notificaciones</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderNotificaciones,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton} {view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],

            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([

        'dataProvider' => $dataProviderNotificacionesNoVisto,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],
           /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>


<br><hr><hr><br>
    <h2>Consultas</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConsulta,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton} {view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],

            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderConsultaNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>


    <br><hr><hr><br>
    <h2 id="notif">Denuncias</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderDenuncia,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton} {view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner No visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],       /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderDenunciaNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>



    <br><hr><hr><br>
    <h2>Avisos de bloqueo:</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderBloqueo,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton} {view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner no visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderBloqueoNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],

          /*  [
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>




    <br><hr><hr><br>
    <h2>Mensajes:</h2>
    <h3 class="verde"><b>Vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderMensaje,
        'columns' => [

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{myButton} {view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner no visto', ['ponernovisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => true];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>

    <h3 class="rojo"><b>No vistos</b></h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderMensajeNoVisto,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {delete}',  // the default buttons + your custom button
            'buttons' => [
                
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success'
                    ]);
                },
                'delete' => function ($url, $model) {
                return Html::a(
                           'Borrar <span class="glyphicon glyphicon-trash"></span>', $url, [
                            
                             'data' => [
                                 'method' => 'post',
                                  // use it if you want to confirm the action
                                  'confirm' => 'Se eliminara el mensaje ¿Estás seguro?',
                              ],
                           
                            'title' => Yii::t('app', 'lead-delete'),'class' => 'btn btn-danger'
                        ]);
                },


                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Poner visto', ['ponervisto','id'=>$model->id], ['class' => 'btn btn-info']);
                }
                ],

                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='../avisos/viewdesdeperfil?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='../avisos/deletedesdeperfil?id='.$model->id;
                        return $url;
                    }

                  }
                
            ],

          /*  [
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                     return ['checked' => false];
                },
            ],*/


            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso',
           // 'clase_aviso_id',
            'texto:ntext',
            //'destino_usuario_id',
            //'origen_usuario_id',
            //'local_id',
            //'comentario_id',
            //'fecha_lectura',
            //'fecha_aceptado',
        ],
    ]); ?>



</div>


