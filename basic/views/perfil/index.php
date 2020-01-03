<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">


<?php $style= <<<CSS

#content{
    font-size: 180%;
}
/*
.left
{ float: left;
  width: auto;
  margin-right: 10px;}

.right
{ float: right; 
  width: auto;
  margin-left: 10px;}

.center
{ display: block;
  text-align: center;
  margin: 20px auto;}

#main, #logo, #menubar, #site_content, #footer
{ margin-left: auto; 
  margin-right: auto;}

#header
{ background: #000;
  border-bottom: 1px solid #3d3d3d;
  height: 186px;}
  
#banner
{  background: transparent url(banner.jpg) no-repeat;
  width: 860px;
  height: 180px;
  margin-bottom: 20px;
  border: 10px solid #DDD;}



#logo #logo_text 
{ position: absolute; 
  top: 10px;
  left: 0;}

#logo h1, #logo h2
{ font: normal 300% 'century gothic', arial, sans-serif;
  border-bottom: 0;
  text-transform: none;
  margin: 0 0 0 9px;}

#logo_text h1, #logo_text h1 a, #logo_text h1 a:hover 
{ padding: 22px 0 0 0;
  color: #FFF;
  letter-spacing: 0.1em;
  text-decoration: none;}

#logo_text h1 a .logo_colour
{ color: #5E4238;}

#logo_text a:hover .logo_colour
{ color: #5E4238;}

#logo_text h2
{ font-size: 120%;
  padding: 4px 0 0 0;
  color: #B48A7C;}




ul#menu li a
{ font: normal 100% 'trebuchet ms', sans-serif;
  display: block; 
  float: left; 
  height: 20px;
  padding: 6px 20px 5px 20px;
  text-align: center;
  color: #FFF;
  text-decoration: none;
  background: #5E4238;} 

ul#menu li.selected a
{ height: 20px;
  padding: 6px 20px 5px 11px;}

ul#menu li.selected
{ margin: 8px 4px 0 13px;
  background: #B48A7C;}

ul#menu li.selected a, ul#menu li.selected a:hover
{ background: #B48A7C;
  color: #FFF;}

ul#menu li a:hover
{ color: #B48A7C;}

#site_content
{ width: 980px;
  overflow: hidden;
  margin: 20px auto 0 auto;
  padding: 0 0 10px 0;} 

#sidebar_container
{ float: left;
  width: 224px;}

.sidebar_top
{ width: 222px;
  height: 14px;
  background: transparent url(side_top.png) no-repeat;}

.sidebar_base
{ width: 222px;
  height: 14px;
  background: url(side_base.png) no-repeat;}

.sidebar
{ float: right;
  width: 222px;
  padding: 0;
  margin: 0 0 16px 0;}

.sidebar_item
{ background: url(side_back.png) repeat-y;
  padding: 0 15px;
  width: 192px;}

.sidebar li a.selected
{ color: #444;} 

.sidebar ul
{ margin: 0;} 

#content
{ text-align: left;
  width: 620px;
  padding: 0 0 0 5px;
  float: right;}
  

{ margin: 10px 0 30px 0;}

table tr th, table tr td
{ background: #3B3B3B;
  color: #FFF;
  padding: 7px 4px;
  text-align: left;}
  
table tr td
{ background: #E5E5DB;
  color: #47433F;
  border-top: 1px solid #FFF;}*/


CSS;
 $this->registerCss($style);
?>



<p>De momento se muestra el usuario con id 1, hay que ponerse de acuerdo con el que haga el login para que guarde en sesion una variable id usuario para 
usarla aqui</p>
<body class="piezaTuPerfil">
  <div id="main">
    <!--<div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
             insert your sidebar items here 
            <h3>Latest News</h3>
            <h4>New Website Launched</h4>
            <h5>February 1st, 2014</h5>
            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="#">link 1</a></li>
              <li><a href="#">link 2</a></li>
              <li><a href="#">link 3</a></li>
              <li><a href="#">link 4</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Search</h3>
            <form method="post" action="#" id="search_form">
              <p>
                <input class="search" type="text" name="search_field" value="Enter keywords....." />
                <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
              </p>
            </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>-->
      <div id="content">
        <!-- insert the page content here -->
        <h1><b>Bienvenido a tu perfil <?php print($dataProvider->getModels()[0]['nombre']); ?></b>
!</h1>
        <p><b>Estos son tus datos.</b></p>
        <ul>
          <li><b>Email:</b> <?php print($dataProvider->getModels()[0]['email']) ?></li>
          <li><b>Nick:</b> <?php print($dataProvider->getModels()[0]['nick']) ?></li>
          <li><b>Nombre:</b> <?php print($dataProvider->getModels()[0]['nombre']) ?></li>
          <li><b>Apellidos:</b> <?php print($dataProvider->getModels()[0]['apellidos']) ?></li>
          <li><b>Direccion:</b> <?php print($dataProvider->getModels()[0]['direccion']) ?></li>
          <li><b>Fecha de registro:</b> <?php print($dataProvider->getModels()[0]['fecha_registro']) ?></li>
          <li><b>Estado de cuenta:</b> <?php ($dataProvider->getModels()[0]['bloqueado']==1) ? print("Bloqueada") :  print("Activa");?></li>
        </ul>


        <h2><b>Tus acciones</b></h2>
        <p><b>Estas son las acciones de tu cuenta sobre las que tienes acceso.</b></p>

          <div style="float:left;">
            <ul>
              <li><?= Html::a('Cambiar datos personales', ['update','id'=>$dataProvider->getModels()[0]['id']], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Alertas y Notificaciones', ['avisos'], ['class' => 'btn btn-success']) ?> </li><br>
              <li><?= Html::a('Establecimientos en Seguimiento', ['seguimientos'], ['class' => 'btn btn-success']) ?> </li>
            </ul>
        </div>

        <div style="float:left;">
            <ul>
              <li><?= Html::a(' Ver tus locales (en caso de tenerlos)', ['index'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a(' Creacion de avisos o incidencias', ['index'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Valoraciones/Comentarios en Establecimientos', ['index'], ['class' => 'btn btn-success']) ?></li><br>
              
            </ul>
        </div>

        <div style="float:left;">
            <ul>
              <li><?= Html::a('Convocatorias/Quedadas Propias', ['index'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a(' Convocatorias como Asistentes', ['index'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Valoraciones/Comentarios en Establecimientos', ['index'], ['class' => 'btn btn-success']) ?> </li><br>
            </ul>
        </div>


        <!--Div para mantenimiento de usuario con categorias y con etiquetas-->
        <div style="float:left;">
            <ul>
              <!--<li>Boton para ver mis categorias preferidas</li> <br>-->
              <li><?= Html::a('Ver mis categorias preferidas', ['usuarios-categorias/categoriasdeusuario'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Ver mis etiquetas preferidas', ['usuarios-etiquetas/etiquetasdeusuario'], ['class' => 'btn btn-success']) ?></li><br>
            </ul>
        </div>
      
        
      </div>
    </div>
   
      
  </div>
</body>



</div>
