<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales imagenes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="locales-imagenes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Anadir Imagen', ['create', 'local_id' => $model], ['class' => 'btn btn-success'])?>
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
			['class' => 'yii\grid\SerialColumn'],
			'local_id',
			'imagen_id',

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
			['class' => 'yii\grid\SerialColumn'],
			'local_id',
			'imagen_id',

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
			['class' => 'yii\grid\SerialColumn'],
			'local_id',
			'imagen_id',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
            ],
        ],
    ]); ?> 
	
	<?php } ?>

</div>
