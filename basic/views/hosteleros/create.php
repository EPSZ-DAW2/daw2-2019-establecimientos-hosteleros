<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hosteleros */

$this->title = 'Create Hosteleros';
?>
<div class="hosteleros-create">

	<?php if($mostrarcabecera){  $this->context->layout = 'FondosPerfil'; ?>
	   <div>
      <?= $this->render('../perfil/PerfilCabecera', [
                //'searchModel' => $searchModel,
                'dataProviderPerfil' => $dataProviderPerfil,
                'hostelero' => $hostelero,
                'avisos'=>$avisos,
            ]); ?>
    </div>
<?php } ?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
