<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Menu;
use yii\widgets\ListView;
use app\models\Locales;
use app\models\LocalesSearch;

$this->title = 'My Yii Application';
$searchModel = new LocalesSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<div class="site-index">

    <div class="container">
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo:ntext',
            'descripcion:ntext',
            'lugar:ntext',
            //'url:ntext',
            //'zona_id',
            'categoria_id',
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

           // ['class' => 'yii\grid\ActionColumn'],
        ],
     ]); ?> 
    </div>

    <br><br>

    <center>
        <h3><strong> Filtros de búsqueda de preferencia </strong></h3>
    </center>

    <br>


    <div class="container">
            <div>
                <?php 
                    echo \Yii::$app->view->renderFile('@app/views/locales/_busquedaSimple.php', [
                        'model'=> new Locales(),
                    ]);
                ?>
            </div>
        </div>




    <!--aqui iria la FICHA RESUMEN, pinchando en los enlaces -->
    <div class="container">
        <h4><u> Filtrar por etiquetas </u></h4>
        <div id="etiquetas">
            <div class="card-block">
                <?php 
                    echo Yii::$app->view->renderFile('@app/views/etiquetas/busquedaetiquetas.php');
                ?>
            </div>
        </div>
    </div>
</div>
