<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;

?>
<?php $style= <<<CSS

.filtros{
  width: 60%;
  height: 5%;     
  display: block;
  margin-left: 10px;
  padding-bottom: 10px;
  margin-bottom: 5px;    
  border-bottom: #A9BCF5 3px solid;    
}
        
.boton{
background: #EFF2FB;
margin-right: 5px;
color: black !important;
border-radius: 150px;    
}

.rojo{
background: #F8E0EC;
}


CSS;
 $this->registerCss($style);
?> 
<nav class="">
    <?php 
        echo Menu::widget([
           'options' => [
               "class" => "nav navbar-nav filtros"
           ],
            'items' =>[
              ['label' => 'Editar', 'url' =>  ['update', 'id' => $model->id, 'actualizar' => 1], 'options' => ['class' => 'boton']],
              ($model->visible == "1") ? (['label' => 'Hacer Invisible', 'url' => ['invisible', 'id' => $model->id], 'options'=> ['class' => 'boton']]):(['label' => 'Hacer Visible', 'url' => ['visible', 'id' => $model->id], 'options'=> ['class' => 'boton']]), 
              ($model->bloqueado == "1" || $model->bloqueado == "2") ? (['label' => 'Desbloquear', 'url' =>['desbloquear', 'id' => $model->id], 'options'=> ['class' => 'boton']]):(['label' => 'Bloquear', 'url' => ['bloquear', 'id' => $model->id], 'options' => ['class' => 'boton']]),  
              ['label'=> 'Ver comentarios bloqueados', 'url' => ['locales-comentarios/bloqueados','local_id' => $model->id], 'options' => ['class' => 'boton rojo']],
            ], 
        ]);
        ?>
</nav>