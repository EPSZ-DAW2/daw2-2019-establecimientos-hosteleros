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

        <div class="container">
            <h4> Locales </h4>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Categoria Id</th>
                </tr>
                <?php foreach($model as $row): ?>
                    <tr>
                        <td><?= $row->id ?></td>
                        <td><?= $row->titulo ?></td>
                        <td><?= $row->descripcion ?></td>
                        <td><?= $row->categoria_id ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
  
        <br><br>

        <center>
            <h3> Filtros de búsqueda de preferencia </h3>
        </center>

        <br>
        <!--aqui iria la FICHA RESUMEN, pinchando en los enlaces -->
        <div class="container">
            <h4><strong> Filtrar por etiquetas </strong></h4>
            <div id="etiquetas">
                <div class="card-block">
                    <?php 
                        echo Yii::$app->view->renderFile('@app/views/etiquetas/busquedaetiquetas.php');
                    ?>
                </div>
            </div>
        </div>
</div>

