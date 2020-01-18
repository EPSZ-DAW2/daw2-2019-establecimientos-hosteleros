	<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

?>

<?php $this->context->layout = 'FondosPerfil'; ?>

<h2>Aqui puedes cambiar tu comentario</h2>
<div class="locales-comentarios-update">



    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
