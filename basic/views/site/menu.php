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

<nav class="nav">

<?= Html::a('Búsqueda Simple', ['index','filtro' => 1], [ "class" => "botones blue"]) ?>

<?= Html::a('Búsqueda Avanzada', ['index','filtro' => 2], [ "class" => "botones blue"]) ?>

<?= Html::a('Búsqueda por Categorías', ['index','filtro' => 3], [ "class" => "botones blue"]) ?>

<?= Html::a('Nube de etiquetas', ['index','filtro' => 4], [ "class" => "botones blue"]) ?>

<?= Html::a('Eliminar Filtros', ['index'], [ "class" => "botones red"]) ?>

</nav>

<hr/>


