<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Create Locales';

?>
<div class="locales-create">
<?php if($mostrarcabecera){ ?>
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
        'actualizar' => $actualizar,
    ]) ?>

</div>
