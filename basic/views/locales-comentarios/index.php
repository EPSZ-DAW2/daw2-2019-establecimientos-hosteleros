<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Comentarios'; //. $model->id ;
//$this->title = Yii::t('app', 'Comentarios');
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model);  //Comprobación de que solo se trata del local correspondiente
\yii\web\YiiAsset::register($this);
?>
<div class="valoraciones">

    <h1>Valoraciones "LOCAL ID =  <?= $model ?>"</h1>


	<p>
        <?= Html::a('Valorar', ['create', 'id' => $model], ['class' => 'btn btn-success']) ?> 		
    </p>


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
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
			//Html::a('Ver', ['viewComentario', 'id'], ['class' => 'btn btn-primary']),
			
        ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> 

</div>
