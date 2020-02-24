<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Mantenimiento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-mantenimiento">
   <div id="content1">
        <!-- insert the page content here -->
        <center>
        <h1><b>Aquí puedes realizar el mantenimiento asociado a las categorías y etiquetas a las que sigues</b></h1>
        <br>
        <h3><b>¡También puedes crear por ti mismo las categorías y etiquetas que quieras o modificar las que has creado! ;-)</b></h3>
        </center>
	</div>
	<br><br>
	<div id="content2">
	<h4><b>Aquí puedes seleccionar tus preferencias de mantenimiento:</b></h4><br>
          <div style="float:left;">
            <ul>
              <!--Cambiar link -->
              <li><?= Html::a('Mantenimiento de categorías', ['categorias/'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Mantenimiento de etiquetas', ['etiquetas/'], ['class' => 'btn btn-success']) ?> </li><br>
              <!--Usuarios-->
              <li><?= Html::a('Mantenimiento de Usuarios',  ['usuarios/'], ['class' => 'btn btn-success']) ?></li><br>
              <!--Cambiar link -->
              <li><?= Html::a('Ver mis categorías preferidas', ['usuarios-categorias/categoriasdeusuario'], ['class' => 'btn btn-success']) ?> </li><br>
              <li><?= Html::a('Ver mis etiquetas preferidas',  ['usuarios-etiquetas/etiquetasdeusuario'], ['class' => 'btn btn-success']) ?></li><br>
            </ul>
        </div>
    </div>
</div>
