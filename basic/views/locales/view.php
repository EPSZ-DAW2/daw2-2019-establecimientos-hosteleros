<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

//$this->title = $model->id;
$this->title = $dataProvider->id;
/*
	<?= DetailView::widget([
        'locales' => $locales,
        'attributes' => [
            //'id',

        ],

    ])
	?>
*/

$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="locales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'actualizar' => 1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quieres eliminar este local?',
                'method' => 'post',
            ],
        ]) ?>
        <?php if($model->bloqueado == "0"){ ?>
        <?= Html::a('Bloquear', ['bloquear', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Seguro que quieres bloquear este local?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php }elseif($model->bloqueado == "1" || $model->bloqueado =="2"){ ?>
        <?= Html::a('Desbloquear', ['desbloquear', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Seguro que quieres desbloquear este local?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } //finif ?>
        
        <?php if($model->visible == "0"){ ?>
        <?= Html::a('Hacer Visible', ['visible', 'id' => $model->id], ['class' => 'btn btn-primary',]) ?>
        <?php }elseif($model->visible == "1"){ ?>
        <?= Html::a('Hacer Invisible', ['invisible', 'id' => $model->id], ['class' => 'btn btn-primary',]) ?>
        <?php } //finif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'titulo:ntext',
            'descripcion:ntext',
            'lugar:ntext',
            'url:ntext',
            'zona_id',
            'categoria_id',
            'imagen_id',
            'sumaValores',
            'totalVotos',
            'hostelero_id', 
            'prioridad',
            'visible',
            'terminado',
            'fecha_terminacion',
            'num_denuncias',
            'fecha_denuncia1',
            'bloqueado',
            'fecha_bloqueo',
            'notas_bloqueo:ntext',
            'cerrado_comentar',
            'cerrado_quedar',
            'crea_usuario_id',
            'crea_fecha',
            'modi_usuario_id',
            'modi_fecha',
            'notas_admin:ntext',
        ],

    ]) 
	?>
	
	
	<?=Html::img(Yii::$app->request->baseUrl."/images/".$model->imagen_id,['width'=>200])?>

    <?= 
        //Añadir un boton de report
        Html::a('Denunciar', ['report', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quieres denunciar este local?',
                'method' => 'post',
            ], 
    ]) ?>

    <?= 
        // Ver los comentarios
        Html::a('Comentarios', ['locales-comentarios/index', 'id' => $model->id], ['class' => 'btn btn-primary'])
	?>
	
	<?= 
        // Ver los comentarios
        Html::a('Imagenes', ['locales-imagenes/index', 'id' => $model->id], ['class' => 'btn btn-primary'])
	?>
</div>
