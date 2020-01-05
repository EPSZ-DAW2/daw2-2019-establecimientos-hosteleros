<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\models\Locales;
use app\models\LocalesSearch;

$this->title = 'My Yii Application';
$searchModel = new LocalesSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<div class="site-index">

    <div class="jumbotron">
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
</div>
