<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hosteleros */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hosteleros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
<div class="hosteleros-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'botones blue']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'botones red',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Usuario', ['usuarios/view', 'id' => $model->usuario_id], ['class' => 'botones blue']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'usuario_id',
            'nif_cif',
            'razon_social',
            'telefono_comercio',
            'telefono_contacto',
            'url:ntext',
            'fecha_alta',
        ],
    ]) ?>

</div>
