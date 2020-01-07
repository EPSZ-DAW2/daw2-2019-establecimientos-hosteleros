<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <nav class="navbar navbar-light navbar2 navbar-toggleable-xs container" >
        <h4>Filtros</h4>
           <?php
                echo Menu::widget([
                    'options'=>[
                        "id" => "nav",
                        "class" => "nav navbar-nav"
                    ],
                    'items'=>[
                        ['label' => 'Establecimientos', 'url' => ['index', 'tipolocal' => 1], 'options'=>["class" => "nav-item"] ],
                        ['label' => 'Locales', 'url' => ['index', 'tipolocal' => 2], 'options' =>["class" =>"nav-item"]],
                        ['label' => 'Todos', 'url' => ['index', 'tipolocal' => 0], 'options'=>["class" => "nav-item"] ],
                    ],
                ]);
           ?>
    </nav>
    
       <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
        ],
    ]); ?> 

    </div>
</div>
