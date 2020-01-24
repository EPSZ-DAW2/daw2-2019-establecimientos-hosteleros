<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\user;
use app\widgets\MostrarOutbox;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bandeja de salida';


?>
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
	<div class="container">			
			<?= Html::a('Recibidos', ['inbox'], ['class' => 'btn btn-primary']) ?>
			<?= Html::a('Nuevo mensaje', ['nuevomsg'], ['class' => 'btn btn-success','style'=>'float:right']) ?>
		
		
			
    <?= MostrarOutbox::widget(["lista"=>$lista]); ?>
	</div>
</div>