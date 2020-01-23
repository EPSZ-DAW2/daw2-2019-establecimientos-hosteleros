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
<div class="locales-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div> <?= Html::a('Volver', ['index', 'id' => $model->local_id], ['class' => 'botones blue']) ?>
        
        <?php 
             if(!Yii::$app->user->isGuest){
                if(Yii::$app->user->identity->admin){ 
            ?>
        <?= Html::a('Editar', ['update', 'id' => $model->id, 'local_id' => $model->local_id, 'actualizar' => 1, 'comentario_id' => $model->comentario_id], ['class' => 'botones blue']) ?>
        <?php if($model->bloqueado == "1" || $model->bloqueado =="2"){?>
            <?= Html::a('Desbloquear', ['desbloquear', 'id' => $model->id], ['class' => 'botones red'])?>
        <?php }elseif($model->bloqueado =="0"){?>
          <?= Html::a('Bloquear', ['bloquear', 'id' => $model->id], ['class' => 'botones red'])?>
        <?php }?>
             <?php  
            }//admin     
        }//guest
        ?>
    </div>
    <br>
    <div>
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
	
    </div>

	<?= 
        // Responder
        Html::a('Responder', ['create', 'id' => $model->id, 'local_id' => $model->local_id, 'comentario_id' => $model->id, 'actualizar' => 2], ['class' => 'botones blue']) ?>
        
        <?=Html::a('Ver Respuestas',['view2', 'comentarios_id'=>$model->id],['class' => 'botones blue']) ?>
                
       <?= 
        //Añadir un boton de report
        Html::a('Report', ['report', 'id' => $model->id], [
            'class' => 'botones red',
            'data' => [
                'confirm' => 'Are you sure you want to report this item?',
                'method' => 'post',
            ], 
    ]) ?>
	
</div>
