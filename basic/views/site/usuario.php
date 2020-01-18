<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Menu;
use yii\widgets\ListView;
use app\models\Locales;
use app\models\LocalesSearch;
use app\models\Etiquetas;
use app\models\EtiquetasSearch;


use yii\widgets\Pjax;

$this->title = 'My Yii Application';

if(!isset($id_padre)) $id_padre = NULL;


?>


<div class="site-index">

        <h3><strong> Filtros de búsqueda de preferencia </strong></h3>

<!-- POR HACER: unificar las búsquedas en una sola barra -->
<div class="navbar-toggleable-xs container">
    <?php 
        echo Menu::widget([
           'options' => [
               "id" => "nav",
               "class" => "nav navbar-nav"
           ],
            'items' =>[
              ['label' => 'Busqueda Simple', 'url' => ['index','filtro' => 1],'options' => [ "class" => "nav-item"]],
              ['label' => 'Busqueda Avanzada', 'url' => ['index','filtro' => 2],'options' => [ "class" => "nav-item"]],  
              ['label' => 'Busqueda por categorias', 'url' => ['index','filtro' => 3],'options' => [ "class" => "nav-item"]],  
              ['label' => 'Nube de etiquetas', 'url' => ['index','filtro' => 4],'options' => [ "class" => "nav-item"]],
              ['label' => 'Eliminar filtros', 'url' => ['index'],'options' => [ "class" => "nav-item"]],  
            ], 
        ]);
        ?>
</div>

    <div class="container">
   
       <?php if($filtro == 1){?> 
        <div style="display: inline;">
        <h4> Búsqueda simple </h4>
                <?php 
                    echo \Yii::$app->view->renderFile('@app/views/locales/_busquedaSimple.php', [
                        'model'=> new Locales(),
                    ]);
                ?>
        </div>
       <?php } ?>

        <?php if($filtro == 2){?>
        <div style="display: inline;">
        <h4> Búsqueda avanzada </h4>
                <?php 
                    echo \Yii::$app->view->renderFile('@app/views/locales/busquedaavanzada.php', [
                        'model'=> new Locales(),
                    ]);
                ?>

        </div>
        <?php } ?>
        
        <?php if ($filtro == 3){?>
        <div style="display: inline;">
        <h4> Búsqueda por categorías </h4>
            <?php 
                echo \Yii::$app->view->renderFile('@app/views/locales/_busquedaCategorias.php', [
                        'model'=> new Locales(),
                        'id_padre' => $id_padre
                ]);
            ?>
        </div>
        <?php } ?>
        
        <?php if($filtro == 4){?>
        <div style="display: inline;">
        <h4> Nube de etiquetas </h4>
            <div id="etiquetas">
                <div class="card-block">
                    <?php 
                        echo \Yii::$app->view->renderFile('@app/views/etiquetas/_busquedaEtiquetas.php');
                    ?>
                </div>
            </div>

        </div>
        <?php } ?>
    </div>


    <br>

    <div style="float:right;" class="container">
        <center>
        <h3>Locales en seguimiento</h3>
        </center>
        <?php
        Pjax::begin(); 
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'locales_mini', //pieza que tiene que pasar otro grupo de la ficha resumida
            'layout' => '<div class="container container-fluid">{items}</div> <div>{pager}{summary}</div>',
            ]);  

        Pjax::end(); ?>
        
         <center>
        <h3>Locales por Categorias</h3>
        </center>
        <?php
        Pjax::begin(); 
        echo ListView::widget([
            'dataProvider' => $dataProvider2,
            'itemView' => 'locales_mini', //pieza que tiene que pasar otro grupo de la ficha resumida
            'layout' => '<div class="container container-fluid">{items}</div> <div>{pager}{summary}</div>',
            ]);  

        Pjax::end(); ?>
        
        <center>
        <h3>Locales por Etiquetas</h3>
        </center>
        <?php
        Pjax::begin(); 
        echo ListView::widget([
            'dataProvider' => $dataProvider3,
            'itemView' => 'locales_mini', //pieza que tiene que pasar otro grupo de la ficha resumida
            'layout' => '<div class="container container-fluid">{items}</div> <div>{pager}{summary}</div>',
            ]);  

        Pjax::end(); ?>
    </div>
</div>
