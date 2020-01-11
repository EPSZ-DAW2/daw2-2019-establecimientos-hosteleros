<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="locales-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div> <?= Html::a('Volver', ['index', 'id' => $model->local_id], ['class' => 'btn btn-primary']) ?>
        <?php if($model->bloqueado == "1" || $model->bloqueado =="2"){?>
            <?= Html::a('Desbloquear', ['desbloquear', 'id' => $model->id], ['class' => 'btn btn-danger'])?>
        <?php }elseif($model->bloqueado =="0"){?>
          <?= Html::a('Bloquear', ['bloquear', 'id' => $model->id], ['class' => 'btn btn-danger'])?>
        <?php }?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
			//'local_id',
            'valoracion:ntext',
            'texto:ntext',
			//'comentario_id',
			[
				'label' => 'comentario_id',
				'format'=>'raw',
				'value' => $model->comentario_id,
			],
			//'cerrado',
            'num_denuncias',
            //'fecha_denuncia1',
            'bloqueado',
            //'fecha_bloqueo',
            'notas_bloqueo',
            //'crea_usuario_id',
            'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
        ],

    ]) ?>
	
    <?= Html::a('Update', ['update', 'id' => $model->id, 'local_id' => $model->local_id, 'actualizar' => 1, 'comentario_id' => $model->comentario_id], ['class' => 'btn btn-success']) ?>

	<?= 
        // Responder
        Html::a('Responder', ['create', 'id' => $model->id, 'local_id' => $model->local_id, 'comentario_id' => $model->id, 'actualizar' => 2], ['class' => 'btn btn-primary']) ?>
        
        <?=Html::a('Ver Respuestas',['view2', 'comentarios_id'=>$model->id],['class' => 'btn btn-primary']) ?>
                
       <?= 
        //Añadir un boton de report
        Html::a('Report', ['report', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to report this item?',
                'method' => 'post',
            ], 
    ]) ?>
	
</div>
