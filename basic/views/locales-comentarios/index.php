<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Comentarios' ;
//$this->title = Yii::t('app', 'Comentarios');
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['locales/index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model);  //Comprobación de que solo se trata del local correspondiente
\yii\web\YiiAsset::register($this);
?>

<?php $style= <<<CSS


.bienvenido{
  margin-top: 20vw;
  background-image: url("../images/miperfil4.jpg");
  background-repeat: no-repeat;
  background-size: 100%,100%;
    width: 100%;
    height: 9.8vw;
  margin-top: 2vw;
}


.imagenLocal{
	object-fit: cover;
	width: 100%;
	height: 300px;
	border-radius: 1.5%;
	
}
        
.botones{
    background: #EFF2FB !important;
    margin-right: 5px;
    color: black !important;
    border-radius: 150px;
    padding: 10px 10px 10px 10px;
    text-decoration: none !important;
    transition-duration: 0.4s;
    cursor: pointer;    
}
        
.red{
    background: #F8E0EC !important;
}
        
.red:hover{
    background: #FA5858 !important;
    color: #FAFAFA !important;
}
        
.blue{
    background: #EFF2FB !important;   
}
        
.blue:hover{
    background: #58ACFA !important;
    color: #FAFAFA !important;    
}

CSS;
 $this->registerCss($style);
?>
<div class="valoraciones">

    <h1>Valoraciones "LOCAL ID =  <?= $model ?>"</h1>

	<p>
        <?= Html::a('Valorar', ['create', 'local_id' => $model, 'id' => 0, 'comentario_id' => 0, 'actualizar' => 0], ['class' => 'botones blue']) ?> 		
    </p>
	
	<?php 
	
	if (!Yii::$app->user->isGuest)
	{
		if (Yii::$app->user->identity->admin)
		{
		
		?>
		
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            'id',
			'local_id',
            'valoracion:ntext',
            'texto:ntext',
            //'comentario_id',
            //'cerrado',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo',
            //'crea_usuario_id',
            'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',

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
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            'id',
			'local_id',
            'valoracion:ntext',
            'texto:ntext',
            //'comentario_id',
            //'cerrado',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo',
            //'crea_usuario_id',
            'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',

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
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            'id',
			'local_id',
            'valoracion:ntext',
            'texto:ntext',
            //'comentario_id',
            //'cerrado',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'bloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo',
            //'crea_usuario_id',
            'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
            ],
        ],
    ]); ?> 
	
	<?php } ?>
    
    <?= Html::a('Volver', ['locales/view', 'id' => $model], ['class' => 'botones blue']) ?>

</div>
