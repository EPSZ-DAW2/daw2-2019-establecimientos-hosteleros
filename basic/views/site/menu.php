<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;

?>
<?php $style= <<<CSS

.filtros{
  width: 100%;
  height: 5%;     
  display: block;
  margin-left: 40px;
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
              ['label' => 'Busqueda Simple', 'url' => ['index','filtro' => 1],'options' => [ "class" => "boton"]],
              ['label' => 'Busqueda Avanzada', 'url' => ['index','filtro' => 2],'options' => [ "class" => "boton"]],  
              ['label' => 'Busqueda por categorias', 'url' => ['index','filtro' => 3],'options' => [ "class" => "boton"]],  
              ['label' => 'Nube de etiquetas', 'url' => ['index','filtro' => 4],'options' => [ "class" => "boton"]],
              ['label' => 'Locales según prioridad', 'url' => ['index','filtro' => 5],'options' => [ "class" => "boton"]],

              ['label' => 'Eliminar filtros', 'url' => ['index'],'options' => [ "class" => "boton rojo"]],  
            ], 
        ]);
        ?>
</nav>