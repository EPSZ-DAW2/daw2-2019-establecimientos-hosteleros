<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HostelerosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hosteleros';
$this->params['breadcrumbs'][] = $this->title;
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
<div class="hosteleros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Hostelero', ['create'], ['class' => 'botones blue']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'usuario_id',
            'nif_cif',
            'razon_social',
            'telefono_comercio',
            //'telefono_contacto',
            //'url:ntext',
            //'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
