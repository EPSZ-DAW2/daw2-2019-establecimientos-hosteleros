<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\Usuarios;
use app\models\UsuariosAvisos;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nuevo mensaje';


?>
<div class="usuarios-avisos-index">
      <?= $this->render('PerfilCabecera', [
                //'searchModel' => $searchModel,
                'dataProviderPerfil' => $dataProviderPerfil,
                'hostelero' => $hostelero,
                'avisos'=>$avisos,
                'localesSinValidar' => $localesSinValidar,
                'comentariosSinValidar' => $comentariosSinValidar, 
            ]); ?>
 </div>
<h1 class="text-center"><b><?= Html::encode($this->title) ?></b></h1>
<div class="usuarios-avisos-form">	

    <?php $form = ActiveForm::begin(); 
						
			$destino_raw = Usuarios::find()->all();
			$destino_map = ArrayHelper::map($destino_raw,'id','nombre');
			
	?>
	
    <?= $form->field($model, 'destino_usuario_id')->dropDownList($destino_map) ?>
    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php 
			
			ActiveForm::end(); ?>

</div>
