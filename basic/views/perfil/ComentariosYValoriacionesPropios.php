<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Comentarios'; //. $model->id ;
//$this->title = Yii::t('app', 'Comentarios');
//$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model);  //Comprobación de que solo se trata del local correspondiente
\yii\web\YiiAsset::register($this);
?>
<?php $this->context->layout = 'FondosPerfil'; ?>
<div class="valoraciones">
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
    <h1>Valoraciones</h1>
    <h3>Aqui puedes ver las valoraciones y comentarios que has realizado:</h3>

<?php if($dataProvider->getTotalCount()>0){ ?>    
    <br><br>

    <h2>Comentarios que no puedes modificar:</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
            ],
            'valoracion:ntext',
            'texto:ntext',
            //'comentario_id',
            //'cerrado',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
			
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {myButton}',
             'buttons' => [
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>',"../locales-comentarios/view?id=".$model->id, ['title' => Yii::t('app', 'view'),'class'=>'btn btn-success']);
                },

                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Petición de cambio', ['peticioncambiocomentario','id'=>$model->id], ['class' => 'btn btn-info']);
                }
            
            
            ]

        
        ],
        /*'urlCreator' => function ($action, $key) {
            if ($action === 'view') {
                $url ='index.php?r=locales-comentarios/view&id='.$key;
                return $url;
            }
        }*/
    ]

    ]); ?> 

    <?php } if($peticiones->getTotalCount()>0){ ?>
        <br><br>
        <h2>Comentarios con peticion de cambio pendiente:</h2>


   <?= GridView::widget([
        'dataProvider' => $peticiones,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
            ],
            'valoracion:ntext',
            'texto:ntext',
            //'comentario_id',
            //'cerrado',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
             'buttons' => [
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>',"../locales-comentarios/view?id=".$model->id, ['title' => Yii::t('app', 'view'),'class'=>'btn btn-success']);
                },

            
            
            ]

        
        ],
        /*'urlCreator' => function ($action, $key) {
            if ($action === 'view') {
                $url ='index.php?r=locales-comentarios/view&id='.$key;
                return $url;
            }
        }*/
    ]

    ]); ?> 



    <?php } 
     if($peticionesAceptadas->getTotalCount()>0){ ?>
        <br><br>
        <h2>Comentarios que puedes cambiar:</h2>

   <?= GridView::widget([
        'dataProvider' => $peticionesAceptadas,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            [
                    'attribute'=>'titulo',
                    'value' =>'locales.titulo',
            ],
            'valoracion:ntext',
            'texto:ntext',
            //'comentario_id',
            //'cerrado',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}',
             'buttons' => [
                'view' => function ($url, $model) {
                return Html::a(
                    'Ver <span class="glyphicon glyphicon-eye-open"></span>',"../locales-comentarios/view?id=".$model->id, ['title' => Yii::t('app', 'view'),'class'=>'btn btn-success']);
                },

                'update' => function ($url, $model) {
                return Html::a('Editar <span class="glyphicon glyphicon-pencil"></span>',"../locales-comentarios/update2?id=".$model->id,[
                            'title' => Yii::t('app', 'update2'),'class'=>'btn btn-info'
                    ]);
                },

            
            
            ]

        
        ],
        /*'urlCreator' => function ($action, $key) {
            if ($action === 'view') {
                $url ='index.php?r=locales-comentarios/view&id='.$key;
                return $url;
            }
        }*/
    ]

    ]); ?> 


    <?php } ?>


</div>
