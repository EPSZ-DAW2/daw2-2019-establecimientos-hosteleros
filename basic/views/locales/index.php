<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Locales', ['create'], ['class' => 'btn btn-success']) ?>       
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            
           
                <?php
                    echo Menu::widget([
                        'options' => [
                            "id"  => "nav",
                            "class" => "nav navbar-nav"
                        ],
                        'items' => [
                            /*['label' => 'Filtros', 'template' => 
                            '<div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {label}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" onclick="mostrarFiltro('.'\'zonas\''.');">Buscar bares</a>
                                    <a class="dropdown-item" href="#" onclick="mostrarFiltro('.'\'categorias\''.');">Buscar restaurantes</a>
                                    <a class="dropdown-item" href="#" onclick="mostrarFiltro('.'\'etiquetas\''.');">Busqueda por etiquetas</a>
                                    <a class="dropdown-item" href="#" onclick="mostrarFiltro('.'\'simple\''.');">Busqueda simple</a>
                                </div>
                            </div>'
                            ,'options' => [ "class" => "nav-item"]],*/
                            ['label' => 'Bares', 'url' => ['index'],'options' => [ "class" => "nav-item"]],
                            ['label' => 'Restaurantes', 'url' => ['index', 'filtro' => 'pop'], 'options' => [ "class" => "nav-item"]],
                            ['label' => 'Otro', 'url' => ['index', 'filtro' => 'rec'], 'options' => [ "class" => "nav-item"]],
                        ],
                    ]);
                ?>
                
            </div>
        
</div>
