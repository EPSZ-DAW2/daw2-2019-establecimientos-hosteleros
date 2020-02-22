<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Confirmar', ['confirmacion'], ['class' => 'btn btn-success']) ?>
        <!--Añandir formulario para mandar por post el id
        
        
        -->
    </p>
    
</div>
