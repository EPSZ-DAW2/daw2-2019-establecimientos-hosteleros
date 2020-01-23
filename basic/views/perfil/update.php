<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\perfil */

$this->title = 'Hola '.$model->nombre;

?>

<?php $this->context->layout = 'FondosPerfil'; ?>
<div class="perfil-update">
	<?php if($mostrarcabecera){ ?>
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
<?php } ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Aqui podras cambiar tus siguientes datos personales:</h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
