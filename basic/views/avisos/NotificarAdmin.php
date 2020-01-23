<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */

$this->title = 'Aquí podras mandar un mensaje a un admin.';

?>
<div class="usuarios-avisos-create">
<div>
      <?= $this->render('../perfil/PerfilCabecera', [
                //'searchModel' => $searchModel,
                'dataProviderPerfil' => $dataProviderPerfil,
                'hostelero' => $hostelero,
                'avisos'=>$avisos,
                'localesSinValidar' => $localesSinValidar,
                'comentariosSinValidar' => $comentariosSinValidar, 

            ]); ?>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('FormNotificarAdmin', [
        'model' => $model,
    ]) ?>

</div>
