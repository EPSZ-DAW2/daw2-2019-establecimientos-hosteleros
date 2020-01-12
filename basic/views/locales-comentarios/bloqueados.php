<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Locales */

$this->title = 'Bloqueados'; //. $model->id ;
//$this->title = Yii::t('app', 'Comentarios');
//$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model);  //Comprobación de que solo se trata del local correspondiente
\yii\web\YiiAsset::register($this);
?>
<div class="valoraciones">
    
    <h3> Comentarios bloqueados del Local: <?= $local_id ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
			
            //'id',
            'local_id',
            //'valoracion:ntext',
            'texto:ntext',
            'comentario_id',
            //'cerrado',
            'num_denuncias',
            'fecha_denuncia1',
            'bloqueado',
            'fecha_bloqueo',
            'notas_bloqueo',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
			
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',],
        ],
    ]); ?> 
    
    <?= Html::a('Volver', ['locales/view', 'id' => $local_id], ['class' => 'btn btn-primary']) ?>
</div>
