<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;

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

<?= Html::a('Editar', ['update', 'id' => $model->id, 'actualizar' => 1], ['class' => 'botones blue']) ?>

<?php
if($model->visible == "1")
{   ?>
  <?= Html::a('Hacer Invisible', ['invisible', 'id' => $model->id], ['class' => 'botones blue']) ?>
  <?php
}
else
{ ?>
  <?= Html::a('Hacer Visible', ['visible', 'id' => $model->id], ['class' => 'botones blue']) ?>
  <?php
}
?>

<?= Html::a('Ver comentarios bloqueados', ['locales-comentarios/bloqueados', 'local_id' => $model->id, 'actualizar' => 1], ['class' => 'botones blue']) ?>

<?php
if($model->bloqueado == "1" || $model->bloqueado == "2")
{   ?>
  <?= Html::a('Desbloquear', ['desbloquear', 'id' => $model->id], ['class' => 'botones red']) ?>
  <?php
}
else
{ ?>
  <?= Html::a('Bloquear', ['bloquear', 'id' => $model->id], ['class' => 'botones red']) ?>
  <?php
}
?>