<?php

use yii\models\LocalesSearch;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="locales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest){
                if(Yii::$app->user->identity->admin){ ?>
        <?= Html::a('Create Locales', ['create', 'actualizar' => 0], ['class' => 'btn btn-success']) ?>    
        <?php } //admin
                }//guest?>
        <?= Html::a('Bares', ['bares'], ['class' => 'btn btn-success']) ?>    
        <?= Html::a('Restaurantes', ['restaurantes'], ['class' => 'btn btn-success']) ?>    
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<?php 
	
	if (!Yii::$app->user->isGuest)
	{
		if (Yii::$app->user->identity->admin)
		{
		
		?>
		
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo:ntext',
            'descripcion:ntext',
            'lugar:ntext',
            //'url:ntext',
            //'zona_id',
            'categoria_id',
            //'imagen_id',
            //'sumaValores',
            //'totalVotos',
            //'hostelero_id',
            //'prioridad',
            //'visible',
            //'terminado',
            //'fecha_terminacion',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'cerrado_comentar',
            //'cerrado_quedar',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}{delete}',
            ],
        ],
    ]); ?> 
		
		<?php
		}
		
		else
		{
			?>		
	
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo:ntext',
            'descripcion:ntext',
            'lugar:ntext',
            //'url:ntext',
            //'zona_id',
            'categoria_id',
            //'imagen_id',
            //'sumaValores',
            //'totalVotos',
            //'hostelero_id',
            //'prioridad',
            //'visible',
            //'terminado',
            //'fecha_terminacion',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'cerrado_comentar',
            //'cerrado_quedar',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
            ],
        ],
    ]); ?> 
	
	<?php }
	}
	
	else
	{ 

	?>		
	
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo:ntext',
            'descripcion:ntext',
            'lugar:ntext',
            //'url:ntext',
            //'zona_id',
            'categoria_id',
            //'imagen_id',
            //'sumaValores',
            //'totalVotos',
            //'hostelero_id',
            //'prioridad',
            //'visible',
            //'terminado',
            //'fecha_terminacion',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'cerrado_comentar',
            //'cerrado_quedar',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
            ],
        ],
    ]); ?> 
	
	<?php } ?>




        
</div>
