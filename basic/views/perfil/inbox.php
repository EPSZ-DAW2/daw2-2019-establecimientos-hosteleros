<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\user;
use app\widgets\MostrarInbox;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bandeja de entrada';


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
			<?= Html::a('Enviados', ['outbox'], ['class' => 'btn btn-primary']) ?>
			<?= Html::a('Nuevo mensaje', ['nuevomsg'], ['class' => 'btn btn-success','style'=>'float:right']) ?>
		
		
			
    <?= MostrarInbox::widget(["lista"=>$lista]); ?>
	</div>
</div>