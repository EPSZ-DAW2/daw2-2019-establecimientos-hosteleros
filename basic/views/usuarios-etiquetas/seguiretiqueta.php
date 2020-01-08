<?php

use yii\helpers\Html;
use yii\web\User;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosEtiquetas */

$this->title = Yii::t('app', 'Elija una etiqueta');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios Etiquetas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="usuarios-etiquetas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formseguiretiqueta', [
        'model' => $model,
        'lista' => $lista,
    ]) ?>

</div>
