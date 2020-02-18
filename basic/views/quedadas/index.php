<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ZonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'quedadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-quedadas">
   <div id="content1">
        <!-- insert the page content here -->
        <center>
        <h1><b>Realiza el mantenimiento del las convocatorias y los asistentes</b></h1>
        <br>
        <h3><b></b></h3>
        </center>
	</div>
	<br><br>
	<div id="content2" >
	<h4><b>Visualiza, edita o modifica las convocatorias y asistencias:</b></h4><br>
          <div style="float:left;">
            <ul class="list-group">
              <!--Cambiar link -->
              <li class="list-group-item "><?= Html::a('Mantenimiento de convocatorias', ['locales-convocatorias/'], ['class' => 'btn btn-light']) ?></li><br>
              <li class="list-group-item "><?= Html::a('Mantenimiento de asistencias', ['locales-convocatorias-asistentes/'], ['class' => 'btn btn-light']) ?> </li><br>
              <!--Cambiar link -->
              
            </ul>
        </div>
    </div>
</div>
