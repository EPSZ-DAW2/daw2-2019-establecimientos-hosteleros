<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Comentario';
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['locales/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $model->comentario_id;
?>
<div class="comentario-create">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?= $this->render('_form', ['model' => $model, 
	'todo' => $todo,
	'id' => $id,
	'local_id' => $local_id,
	'comentario_id' => $comentario_id,
	]) ?>

</div>
